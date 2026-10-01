#!/bin/bash
set -e

echo "Starting Russ Rental Laravel Application..."

# Append KEY="value" to .env, escaping characters that dotenv would otherwise
# interpret (double quotes, backslashes and dollar signs) or reject as invalid
# whitespace. Unquoted values containing spaces make the whole file unparsable,
# which breaks every subsequent artisan command.
write_env() {
    printf '%s="%s"\n' "$1" "$(printf '%s' "$2" | sed -e 's/[\\"]/\\&/g' -e 's/\$/\\$/g')" >> .env
}

# Railway/MySQL inject MYSQLHOST, MYSQLUSER, MYSQLPASSWORD, MYSQLDATABASE.
# Seed .env from those only when the matching DB_* variables are absent, so the
# file never shadows real credentials with localhost placeholders.
if [ ! -f .env ]; then
    echo "Creating .env file from environment variables..."
    : > .env

    write_env APP_NAME "${APP_NAME:-Russ Rental}"
    write_env APP_ENV "${APP_ENV:-production}"
    write_env APP_DEBUG "${APP_DEBUG:-false}"
    write_env APP_URL "${APP_URL:-http://localhost}"
    write_env APP_LOCALE "${APP_LOCALE:-id}"
    write_env APP_FALLBACK_LOCALE "${APP_FALLBACK_LOCALE:-en}"

    write_env LOG_CHANNEL "${LOG_CHANNEL:-stack}"
    write_env LOG_LEVEL "${LOG_LEVEL:-error}"

    write_env DB_CONNECTION "${DB_CONNECTION:-mysql}"
    write_env DB_HOST "${DB_HOST:-${MYSQLHOST:-mysql}}"
    write_env DB_PORT "${DB_PORT:-${MYSQLPORT:-3306}}"
    write_env DB_DATABASE "${DB_DATABASE:-${MYSQLDATABASE:-railway}}"
    write_env DB_USERNAME "${DB_USERNAME:-${MYSQLUSER:-root}}"
    write_env DB_PASSWORD "${DB_PASSWORD:-${MYSQLPASSWORD:-}}"

    write_env FILESYSTEM_DISK "${FILESYSTEM_DISK:-public}"
    write_env SESSION_DRIVER "${SESSION_DRIVER:-database}"
    write_env SESSION_LIFETIME "${SESSION_LIFETIME:-120}"
    write_env QUEUE_CONNECTION "${QUEUE_CONNECTION:-database}"
    write_env CACHE_STORE "${CACHE_STORE:-database}"

    write_env MAIL_MAILER "${MAIL_MAILER:-log}"
    write_env MAIL_FROM_ADDRESS "${MAIL_FROM_ADDRESS:-concierge@russrental.com}"
    write_env MAIL_FROM_NAME "${APP_NAME:-Russ Rental}"
    write_env RUSS_RENTAL_WHATSAPP "${RUSS_RENTAL_WHATSAPP:-}"

    echo "Generated .env:"
    sed -e 's/\(DB_PASSWORD=\).*/\1***/' -e 's/\(MYSQL[A-Z]*=\).*/\1***/' .env
fi

# Wait for database if needed
if [ -n "${DB_HOST:-${MYSQLHOST:-}}" ]; then
    echo "Waiting for database connection..."
    sleep 5
fi

# Generate APP_KEY if not set. If APP_KEY already exists in the environment we
# reuse it so sessions and encrypted payloads survive redeploys.
if [ -n "${APP_KEY:-}" ]; then
    echo "APP_KEY provided by environment, skipping generation."
    grep -q "^APP_KEY=" .env 2>/dev/null || write_env APP_KEY "${APP_KEY}"
elif [ -f .env ] && grep -q "APP_KEY=base64:" .env; then
    echo "APP_KEY already present in .env, skipping generation."
else
    echo "APP_KEY not set, generating..."
    php artisan key:generate --force || echo "WARNING: key:generate failed, continuing."
fi

# Run migrations if AUTO_MIGRATE is true. A migration failure must not take the
# whole container down, otherwise Railway marks the service as crashed and the
# console becomes unreachable for diagnosing the actual database error.
if [ "${AUTO_MIGRATE:-false}" = "true" ]; then
    echo "Running migrations..."
    if ! php artisan migrate --force --no-interaction; then
        echo "WARNING: migrations failed, continuing to boot the web server."
    fi
fi

# Cache configuration for performance. Caching is an optimisation, so a failure
# here degrades performance instead of taking the service offline.
echo "Caching configuration..."
php artisan config:cache || echo "WARNING: config:cache failed, continuing."
php artisan route:cache || echo "WARNING: route:cache failed, continuing."
php artisan view:cache || echo "WARNING: view:cache failed, continuing."

# Create storage link if not exists
if [ ! -L "/var/www/public/storage" ]; then
    echo "Creating storage link..."
    php artisan storage:link || echo "WARNING: storage:link failed, continuing."
fi

# Set proper permissions
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

echo "Starting web server on port 8080..."
exec php artisan serve --host=0.0.0.0 --port=8080

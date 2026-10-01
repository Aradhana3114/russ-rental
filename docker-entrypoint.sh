#!/bin/bash
set -e

echo "Starting Russ Rental Laravel Application..."

# Railway/MySQL inject MYSQLHOST, MYSQLUSER, MYSQLPASSWORD, MYSQLDATABASE.
# Seed .env from those only when the matching DB_* variables are absent, so the
# file never shadows real credentials with localhost placeholders.
if [ ! -f .env ]; then
    echo "Creating .env file from environment variables..."
    : > .env

    echo "APP_NAME=${APP_NAME:-Russ Rental}" >> .env
    echo "APP_ENV=${APP_ENV:-production}" >> .env
    echo "APP_DEBUG=${APP_DEBUG:-false}" >> .env
    echo "APP_URL=${APP_URL:-http://localhost}" >> .env
    echo "APP_LOCALE=${APP_LOCALE:-id}" >> .env
    echo "APP_FALLBACK_LOCALE=${APP_FALLBACK_LOCALE:-en}" >> .env

    echo "LOG_CHANNEL=${LOG_CHANNEL:-stack}" >> .env
    echo "LOG_LEVEL=${LOG_LEVEL:-error}" >> .env

    echo "DB_CONNECTION=${DB_CONNECTION:-mysql}" >> .env
    echo "DB_HOST=${DB_HOST:-${MYSQLHOST:-mysql}}" >> .env
    echo "DB_PORT=${DB_PORT:-${MYSQLPORT:-3306}}" >> .env
    echo "DB_DATABASE=${DB_DATABASE:-${MYSQLDATABASE:-railway}}" >> .env
    echo "DB_USERNAME=${DB_USERNAME:-${MYSQLUSER:-root}}" >> .env
    echo "DB_PASSWORD=${DB_PASSWORD:-${MYSQLPASSWORD:-}}" >> .env

    echo "FILESYSTEM_DISK=${FILESYSTEM_DISK:-public}" >> .env
    echo "SESSION_DRIVER=${SESSION_DRIVER:-database}" >> .env
    echo "SESSION_LIFETIME=${SESSION_LIFETIME:-120}" >> .env
    echo "QUEUE_CONNECTION=${QUEUE_CONNECTION:-database}" >> .env
    echo "CACHE_STORE=${CACHE_STORE:-database}" >> .env

    echo "MAIL_MAILER=${MAIL_MAILER:-log}" >> .env
    echo "MAIL_FROM_ADDRESS=${MAIL_FROM_ADDRESS:-concierge@russrental.com}" >> .env
    echo "MAIL_FROM_NAME=\"\${APP_NAME}\"" >> .env

    echo "RUSS_RENTAL_WHATSAPP=\"\${RUSS_RENTAL_WHATSAPP:-}\"" >> .env
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
    grep -q "^APP_KEY=" .env 2>/dev/null || echo "APP_KEY=${APP_KEY}" >> .env
elif [ -f .env ] && grep -q "APP_KEY=base64:" .env; then
    echo "APP_KEY already present in .env, skipping generation."
else
    echo "APP_KEY not set, generating..."
    php artisan key:generate --force
fi

# Run migrations if AUTO_MIGRATE is true. A migration failure must not take the
# whole container down, otherwise Railway marks the service as crashed and the
# console becomes unreachable for diagnosing the actual database error.
if [ "$AUTO_MIGRATE" = "true" ]; then
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

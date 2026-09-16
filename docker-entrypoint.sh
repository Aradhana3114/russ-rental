#!/bin/bash
set -e

echo "Starting Russ Rental Laravel Application..."

# Wait for database if needed
if [ ! -z "$DB_HOST" ]; then
    echo "Waiting for database connection..."
    sleep 5
fi

# Generate APP_KEY if not set
if [ -z "$APP_KEY" ]; then
    echo "APP_KEY not set, generating..."
    php artisan key:generate --force
fi

# Run migrations if AUTO_MIGRATE is true
if [ "$AUTO_MIGRATE" = "true" ]; then
    echo "Running migrations..."
    php artisan migrate --force --no-interaction
fi

# Cache configuration for performance
echo "Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create storage link if not exists
if [ ! -L "/var/www/public/storage" ]; then
    echo "Creating storage link..."
    php artisan storage:link
fi

# Set proper permissions
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

echo "Starting web server on port 8080..."
exec php artisan serve --host=0.0.0.0 --port=8080

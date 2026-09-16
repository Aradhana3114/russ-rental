# Railway Environment Variables Setup Guide

Setelah deployment, set environment variables ini di Railway Dashboard:

## Required Variables:

```bash
APP_NAME="Russ Rental"
APP_ENV=production
APP_KEY=base64:GENERATE_THIS_WITH_php_artisan_key:generate
APP_DEBUG=false
APP_URL=https://russ-rental-production.up.railway.app

APP_LOCALE=id
APP_FALLBACK_LOCALE=en

LOG_CHANNEL=stack
LOG_LEVEL=error

# Database variables akan otomatis tersedia dari MySQL service Railway:
# DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
# Atau gunakan variable references:
DB_CONNECTION=mysql
DB_HOST=${{MYSQLHOST}}
DB_PORT=${{MYSQLPORT}}
DB_DATABASE=${{MYSQLDATABASE}}
DB_USERNAME=${{MYSQLUSER}}
DB_PASSWORD=${{MYSQLPASSWORD}}

FILESYSTEM_DISK=public
SESSION_DRIVER=database
SESSION_LIFETIME=120
QUEUE_CONNECTION=database

MAIL_MAILER=log
MAIL_FROM_ADDRESS=concierge@russrental.com
MAIL_FROM_NAME="Russ Rental"

RUSS_RENTAL_WHATSAPP="+62 851-8666-9860"
```

## Cara Set di Railway:

1. Buka Railway Dashboard → Project russ-rental
2. Klik service "russ-rental"
3. Tab "Variables"
4. Add variable satu per satu
5. Untuk APP_KEY, generate dulu local: `php artisan key:generate --show`
6. Pastikan MySQL service sudah di-add (klik + New → Database → MySQL)

## Post-Deployment Commands (via Railway CLI atau Console):

```bash
# 1. Run migrations
php artisan migrate --force

# 2. Create storage link
php artisan storage:link

# 3. Seed database (optional)
php artisan db:seed --force

# 4. Create admin user
php artisan make:filament-user
```

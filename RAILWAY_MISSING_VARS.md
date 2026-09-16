# CRITICAL: Add these variables in Railway Dashboard

## Required Environment Variables (Missing):

```
APP_KEY=base64:R6p3AnY3nZAazKUWNHALM6YUzJOrg/XeL4URaH27tMI=
APP_ENV=production
APP_DEBUG=false
APP_URL=https://russ-rental-production.up.railway.app
APP_LOCALE=id
APP_FALLBACK_LOCALE=en
LOG_CHANNEL=stack
LOG_LEVEL=error
```

## Optional (for auto-migration on deploy):

```
AUTO_MIGRATE=true
```

## Database Variables:

If using Railway MySQL service, add these references:
```
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
```

Or if variables already exist from MySQL service, they should auto-connect.

## Current Variables You Already Have:

✅ DB_CONNECTION
✅ DB_DATABASE
✅ DB_USERNAME
✅ DB_PASSWORD
✅ FILESYSTEM_DISK
✅ SESSION_DRIVER
✅ SESSION_LIFETIME
✅ QUEUE_CONNECTION
✅ MAIL_MAILER
✅ MAIL_FROM_ADDRESS
✅ MAIL_FROM_NAME
✅ RUSS_RENTAL_WHATSAPP

## What to do NOW:

1. Go to Railway Dashboard → russ-rental service → Variables tab
2. Click "+ New Variable" and add each missing variable above
3. Most important: **APP_KEY** (without this, 500 error will persist)
4. After adding, Railway will auto-redeploy
5. Wait 3-5 minutes for deployment to complete
6. Check https://russ-rental-production.up.railway.app

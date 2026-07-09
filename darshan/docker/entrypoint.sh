#!/bin/sh
set -eu

export PORT="${PORT:-10000}"

mkdir -p \
    storage/app/public \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

if [ -z "${APP_KEY:-}" ]; then
    echo "APP_KEY is not set. Set it in Render environment variables." >&2
    exit 1
fi

if ! printf '%s' "$APP_KEY" | grep -q '^base64:'; then
    if php -r '$key = getenv("APP_KEY"); $decoded = base64_decode($key, true); exit($decoded !== false && strlen($decoded) === 32 ? 0 : 1);'; then
        export APP_KEY="base64:${APP_KEY}"
    fi
fi

php artisan storage:link --force

if [ "${RUN_MIGRATIONS:-true}" = "true" ]; then
    php artisan migrate --force
fi

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

exec "$@"

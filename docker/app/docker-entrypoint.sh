#!/usr/bin/env sh
set -e

composer install --no-interaction --no-progress

php artisan key:generate --no-interaction --force

if [[ "$1" != "start" ]]; then
    exec "$@"
fi

/usr/local/bin/wait

php artisan migrate --no-interaction --force --seed
php artisan storage:link --no-interaction --force

exec php-fpm

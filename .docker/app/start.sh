#!/usr/bin/env sh
set -e

composer install --no-interaction --no-progress --no-suggest

php artisan key:generate --no-interaction
php artisan migrate --no-interaction --force --seed
php artisan storage:link --no-interaction

exec supervisord -n -c /etc/supervisord.conf

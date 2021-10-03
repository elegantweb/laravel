#!/usr/bin/env sh
set -e

composer install --no-interaction --no-progress

php artisan key:generate --no-interaction --force
php artisan migrate --seed --no-interaction --force
php artisan storage:link --no-interaction

exec supervisord -n -c /etc/supervisord.conf

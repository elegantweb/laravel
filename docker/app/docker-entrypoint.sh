#!/usr/bin/env sh
set -e

composer --version
composer install --no-interaction --no-progress

php artisan key:generate --no-interaction --force

if [[ "$1" != "start" ]]; then
    exec "$@"
fi

/usr/local/bin/wait

php artisan migrate --no-interaction --force --seed
php artisan storage:link --no-interaction --force
php artisan cache:clear --no-interaction

exec supervisord -c /etc/supervisord.conf

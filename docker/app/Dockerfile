FROM php:8.0-fpm-alpine

RUN apk add --no-cache \
        supervisor \
        bash

ENV COMPOSER_ALLOW_SUPERUSER 1
# see: https://getcomposer.org/doc/articles/troubleshooting.md#memory-limit-errors
ENV COMPOSER_MEMORY_LIMIT -1
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ADD https://raw.githubusercontent.com/elegantweb/docker-wait/master/wait /usr/local/bin
RUN chmod +x /usr/local/bin/wait

RUN docker-php-ext-install pdo_mysql

COPY ./crontabs/www-data /etc/crontabs/www-data
RUN crontab -u www-data /etc/crontabs/www-data

COPY ./supervisord.conf /etc/supervisord.conf

COPY start.sh /usr/local/bin

CMD /usr/local/bin/wait && start.sh

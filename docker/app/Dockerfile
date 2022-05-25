FROM php:8.1-fpm-alpine

ENV COMPOSER_ALLOW_SUPERUSER 1
# see: https://getcomposer.org/doc/articles/troubleshooting.md#memory-limit-errors
ENV COMPOSER_MEMORY_LIMIT -1
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Add the wait script to the image
ADD https://github.com/ufoscout/docker-compose-wait/releases/download/2.9.0/wait /usr/local/bin/wait
RUN chmod +x /usr/local/bin/wait

RUN docker-php-ext-install pdo_mysql

COPY ./crontabs/www-data /etc/crontabs/www-data
RUN crontab -u www-data /etc/crontabs/www-data

COPY ./docker-entrypoint.sh /usr/local/bin
RUN chmod +x /usr/local/bin/docker-entrypoint.sh
ENTRYPOINT ["docker-entrypoint.sh"]

CMD ["start"]

FROM php:8.1-fpm-alpine

# Add supervisord
COPY --from=ochinchina/supervisord:latest /usr/local/bin/supervisord /usr/local/bin/supervisord

# Add supercronic
ADD https://github.com/aptible/supercronic/releases/download/v0.2.1/supercronic-linux-amd64 /usr/local/bin/supercronic
RUN chmod +x /usr/local/bin/supercronic

# Add the wait script to the image
ADD https://github.com/ufoscout/docker-compose-wait/releases/download/2.9.0/wait /usr/local/bin/wait
RUN chmod +x /usr/local/bin/wait

# Install PHP extensions
COPY --from=mlocati/php-extension-installer:2.1.1 /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions @composer pdo_mysql

COPY ./supercronic.crontab /etc/
COPY ./supervisord.conf /etc/

COPY ./docker-entrypoint.sh /usr/local/bin
RUN chmod +x /usr/local/bin/docker-entrypoint.sh
ENTRYPOINT ["docker-entrypoint.sh"]

CMD ["start"]

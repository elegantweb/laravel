FROM mariadb:10.6

# this makes the database initialization really faster
ENV MYSQL_INITDB_SKIP_TZINFO 1

COPY config/ /etc/mysql/conf.d/

FROM php:8.2-apache

COPY ./ /var/www/html/

RUN chown -R www-data:www-data /var/www/html
RUN apt-get update
RUN apt-get install -y --no-install-recommends openssl sqlite3 libsqlite3-dev
RUN docker-php-ext-install pdo_sqlite
RUN rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod ssl
COPY server.crt /etc/ssl/certs/server.crt
COPY server.key /etc/ssl/private/server.key

EXPOSE 80

CMD ["apache2-foreground"]

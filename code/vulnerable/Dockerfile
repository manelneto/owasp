FROM php:8.2-apache

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html
RUN apt-get update
RUN apt-get install -y --no-install-recommends sqlite3 libsqlite3-dev
RUN docker-php-ext-install pdo_sqlite
RUN rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2dismod ssl
RUN rm /etc/apache2/sites-available/default-ssl.conf

EXPOSE 80

CMD ["apache2-foreground"]

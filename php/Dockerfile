FROM php:8.0-apache
RUN chown -R www-data:www-data /var/www/html
COPY php/src /var/www/html/
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y

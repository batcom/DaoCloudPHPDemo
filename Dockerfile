FROM php:5.6-apache
COPY config/php.ini /usr/local/etc/php/
COPY src/ /var/www/html/
RUN docker-php-ext-install mysqli
EXPOSE 80

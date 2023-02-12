#FROM php:7.4-fpm-alpine
FROM php:8.0-fpm-alpine

WORKDIR /var/www/html
 
COPY src .
 
RUN docker-php-ext-install pdo pdo_mysql
COPY --from=composer/composer:2-bin /composer /usr/bin/composer

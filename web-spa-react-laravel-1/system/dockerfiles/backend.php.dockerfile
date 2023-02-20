FROM php:7.4-fpm

WORKDIR /var/www/html/
COPY src/back .

RUN apt-get update
RUN apt-get -y install libzip-dev nodejs
RUN docker-php-ext-install pdo pdo_mysql zip
COPY --from=composer/composer:2-bin /composer /usr/bin/composer

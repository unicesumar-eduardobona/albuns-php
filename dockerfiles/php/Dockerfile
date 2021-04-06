FROM php:7.3-fpm

RUN apt-get update
RUN apt-get install -y --no-install-recommends apt-utils
RUN apt-get install -y zlib1g-dev libicu-dev g++ libxml2-dev libzip-dev curl zip unzip

RUN docker-php-ext-install gettext intl
RUN docker-php-ext-install pdo_mysql mbstring opcache zip soap

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/htdocs

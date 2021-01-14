FROM php:7.2-fpm

RUN pecl install xdebug-2.6.0 \
    && docker-php-ext-enable xdebug

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mariadb-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && pecl install mcrypt \
    && docker-php-ext-enable mcrypt \
    && docker-php-ext-install pdo_mysql
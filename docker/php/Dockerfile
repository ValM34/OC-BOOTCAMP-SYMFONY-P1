FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    postgresql-dev \
    linux-headers \
    $PHPIZE_DEPS

RUN docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www/html

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

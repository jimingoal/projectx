FROM php:8.0.6-fpm-alpine

RUN docker-php-ext-install mysqli

RUN cp "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

FROM php:8.1-fpm-alpine

RUN apk add --no-cache autoconf g++ make \
    && pecl install xdebug \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable xdebug

RUN apk add --no-cache postgresql-dev fcgi \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo_pgsql

COPY ./php/conf.d /usr/local/etc/php/conf.d

RUN chown www-data:www-data ./ -R

WORKDIR /var/www


EXPOSE 9000

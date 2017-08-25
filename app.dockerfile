FROM php:7.0.4-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    && apt-get install -y php5-memcached \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && apt-get install -y libz-dev libmemcached-dev \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql \
    && pecl install memcached \
    && echo extension=memcached.so >> /usr/local/etc/php/conf.d/memcached.ini
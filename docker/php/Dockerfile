FROM php:7.4-fpm

RUN set -eux; \
    apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y --no-install-recommends \
            curl \
            cron \
            rsyslog \
            wget \
            zip \
            npm \
            openssh-client \
            unzip \
            libmemcached-dev \
            libz-dev \
            libpq-dev \
            libjpeg-dev \
            libpng-dev \
            libfreetype6-dev \
            libssl-dev \
            libmcrypt-dev \
            libzip-dev \
            libonig-dev \
            net-tools \
            supervisor \
            git

RUN set -eux; \
    docker-php-ext-install pdo_mysql; \
    docker-php-ext-install mysqli; \
#    docker-php-ext-install pdo_pgsql; \
    docker-php-ext-install zip; \
    docker-php-ext-configure gd \
            --prefix=/usr \
            --with-jpeg \
            --with-freetype; \
    docker-php-ext-install gd;

RUN pecl install xdebug-3.1.5 memcached
RUN docker-php-ext-enable xdebug memcached

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


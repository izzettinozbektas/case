FROM php:8.1-fpm

RUN apt-get update && apt-get install -y git
RUN apt-get install -y autoconf pkg-config libssl-dev
RUN pecl install mongodb
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini
#In this place you can specify all the extensions you need.
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-install zip
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www
RUN apt-get install -y libmariadb-dev
RUN docker-php-ext-install mysqli

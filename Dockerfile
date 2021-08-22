FROM php:7.2-apache

RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    zip \
    unzip \
    zlib1g-dev \
    libpng-dev

RUN apt-get install -y libpq-dev

RUN docker-php-ext-configure zip --with-libzip
RUN docker-php-ext-install pdo_mysql zip gd
RUN a2enmod rewrite

ADD . /var/www
ADD ./public /var/www/html

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap
RUN chmod -R 755 /var/www/storage /var/www/bootstrap

WORKDIR /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --version=1.10.15 --install-dir=./ --filename=composer
RUN ./composer install --no-dev

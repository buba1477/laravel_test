FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      git \
      curl \
      # Устанавливаем nodejs и npm напрямую из репозитория Debian
      nodejs \
      npm

RUN docker-php-ext-install pdo_mysql bcmath gd zip
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pgsql pdo_pgsql

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org | php -- --filename=composer --install-dir=/usr/local/bin

WORKDIR /var/www
RUN chown -R www-data:www-data /var/www

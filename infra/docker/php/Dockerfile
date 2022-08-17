FROM php:8.1.9-fpm-bullseye
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

# timezone environment
ENV TZ=UTC \
  # locale
  LANG=en_US.UTF-8 \
  LANGUAGE=en_US:en \
  LC_ALL=en_US.UTF-8 \
  # composer environment
  COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update
RUN apt-get -y install vim git cron libicu-dev libonig-dev libzip-dev unzip locales libfreetype6-dev libjpeg62-turbo-dev libpng-dev libcurl4-openssl-dev pkg-config libssl-dev
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/*
RUN locale-gen en_US.UTF-8
RUN localedef -f UTF-8 -i en_US en_US.UTF-8
RUN mkdir /var/run/php-fpm
RUN docker-php-ext-install intl pdo_mysql zip bcmath gd
RUN composer config -g process-timeout 3600
RUN composer config -g repos.packagist composer https://packagist.org

COPY ./infra/docker/php/php-fpm.d/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
COPY ./infra/docker/php/php.ini /usr/local/etc/php/php.ini

WORKDIR /work/app

CMD bash -c "php-fpm"

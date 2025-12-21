FROM laravelsail/php82-composer:latest

ARG WWWGROUP
ARG WWWUSER

USER root

RUN groupadd --gid $WWWGROUP sail && \
    useradd -g sail -u $WWWUSER -G root sail

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libicu-dev \
    libmcrypt-dev \
    libpq-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install gd
RUN docker-php-ext-install intl
RUN docker-php-ext-install calendar
RUN docker-php-ext-install pdo_pgsql

USER sail

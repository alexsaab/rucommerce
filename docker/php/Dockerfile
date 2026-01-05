FROM laravelsail/php82-composer:latest

ARG WWWGROUP
ARG WWWUSER

USER root

RUN groupadd --gid $WWWGROUP sail && \
    useradd -ms /bin/bash -g sail -u $WWWUSER -G root sail

RUN apt-get update && apt-get install -y \
    build-essential \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libgd-dev \
    jpegoptim optipng pngquant gifsicle \
    libonig-dev \
    libxml2-dev \
    zip \
    sudo \
    unzip \
    npm \
    libicu-dev \
    libpq-dev \
    nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install gd
RUN docker-php-ext-install intl
RUN docker-php-ext-install calendar
RUN docker-php-ext-install pdo_pgsql



USER sail

FROM php:8.4-apache

# Set environment variables
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Install dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    zip unzip wget curl libzip-dev libicu-dev libonig-dev \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    libxml2-dev libxslt1-dev libcurl4-openssl-dev \
    libssl-dev libmcrypt-dev libreadline-dev \
    libmemcached-dev libz-dev libpq-dev \
    libldap2-dev libsnmp-dev \
    libmagickwand-dev libmagickcore-dev \
    autoconf build-essential \
    libmariadb-dev libmariadb-dev-compat && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install \
    mysqli \
    pdo \
    pdo_mysql \
    gd \
    xsl \
    xml \
    intl \
    opcache \
    mbstring \
    exif \
    calendar \
    sockets \
    bz2 \
    zip && \
    docker-php-ext-enable \
    mysqli \
    pdo \
    pdo_mysql \
    gd \
    xsl \
    xml \
    intl \
    opcache \
    mbstring \
    exif \
    calendar \
    sockets \
    bz2 \
    zip && \
    apt-get clean -y && rm -rf /var/lib/apt/lists/*

# Install Xdebug
RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

# # Enable Apache modules
RUN a2enmod rewrite headers ssl
# Apache configuration /home/app
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN service apache2 restart
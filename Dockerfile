FROM php:8.4-apache

COPY . /home/app
WORKDIR /home/app

ENV APACHE_DOCUMENT_ROOT /home/app/public

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libxml2-dev \
    libonig-dev \
    unzip \
    git \
    curl \
    libicu-dev \
    libpq-dev \
    libmcrypt-dev \
    libxslt-dev \
    libmemcached-dev \
    libldap2-dev \
    libssl-dev \
    libcurl4-openssl-dev \
    libsqlite3-dev \
    libbz2-dev \
    libgmp-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd zip pdo pdo_mysql pdo_pgsql pdo_sqlite mysqli xml xsl bcmath intl opcache mbstring exif calendar ldap sockets bz2 gmp

EXPOSE 80 443

# Enable Apache modules
RUN a2enmod rewrite headers ssl
# Apache configuration /home/app
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf 

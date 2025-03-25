From php:8.1-apache

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    libzip-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip unzip \
    && docker-php-ext-install pdo pdo_mysql gd zip

RUN a2enmod rewrite

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

RUN php -r "unlink('composer-setup.php');"

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

COPY ./apache/000-laravel.conf /etc/apache2/sites-available/000-laravel.conf

RUN a2dissite 000-default.conf

RUN a2ensite 000-laravel.conf

WORKDIR /var/www/html
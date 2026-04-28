FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev libzip-dev zip \
    && docker-php-ext-install pdo_mysql

# Install Composer

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Configure Git to trust the project directory to avoid "dubious ownership" warnings
RUN git config --global --add safe.directory /var/www/html

# Copy all project files into the container
COPY . .

# Install PHP dependencies using Composer
RUN composer install

# Copy composer files first (cache optimization)
COPY composer.json composer.lock ./

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copy the rest of the app
COPY . .

# Permissions (important for Laravel)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache
# Use the official PHP 8.3 image as base
FROM php:8.3-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application source code
COPY . /var/www/html

# Install application dependencies
RUN composer install

# Expose port 8000 and start php-fpm server
EXPOSE 8000
CMD ["php-fpm"]

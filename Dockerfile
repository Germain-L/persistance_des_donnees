# Use an official PHP runtime as a parent image
FROM php:8.2-fpm

# Set the working directory in the container to /var/www
WORKDIR /var/www

# Install libraries
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Remove existing definitions
RUN rm -rf /etc/nginx/conf.d/*

# Copy the current directory contents into the container at /var/www
COPY . /var/www

# Make port 80 available to the world outside this container
EXPOSE 80

# Run composer
RUN composer install

# Run Symfony server
CMD php -S 0.0.0.0:80 -t public

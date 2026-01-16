# web/Dockerfile
FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy your web files
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Expose port 80 (default)
EXPOSE 80

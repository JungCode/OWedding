FROM php:7.4-fpm

# Install PHP PDO extension for MySQL
RUN docker-php-ext-install pdo pdo_mysql
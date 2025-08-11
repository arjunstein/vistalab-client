# ---------- Stage 1: Build assets ----------
FROM node:20 AS node_builder
WORKDIR /var/www/html

COPY package*.json ./
RUN npm install --legacy-peer-deps --ignore-scripts

COPY . .
RUN npm run build

# ---------- Stage 2: PHP with Composer ----------
FROM php:8.3-fpm AS php_builder

RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libpng-dev libjpeg-dev libfreetype6-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql gd zip bcmath

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html

COPY . .
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copy built assets from node_builder
COPY --from=node_builder /var/www/html/public /var/www/html/public

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

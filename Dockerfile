# Stage 1: Build Vite assets
FROM node:18 AS node_builder
WORKDIR /app
COPY package*.json vite.config.js ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 2: Install composer dependencies
FROM composer:2 AS composer_builder
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
COPY . .
RUN composer dump-autoload --optimize

# Stage 3: Final FrankenPHP image
FROM dunglas/frankenphp:1.1-php8.2

# Install required PHP extensions
RUN install-php-extensions \
    pdo_mysql mbstring exif pcntl bcmath gd zip

# Set working dir
WORKDIR /app

# Copy vendor & app code
COPY --from=composer_builder /app /app

# Copy built assets
COPY --from=node_builder /app/public /app/public

# Set permissions
RUN chown -R www-data:www-data /app && chmod -R 755 /app

# Expose FrankenPHP default port
EXPOSE 80

# Enable Laravel runtime mode
ENV SERVER_NAME=:80
ENV FRANKENPHP_CONFIG="worker ./public/index.php"

# Start FrankenPHP
CMD ["php", "vendor/bin/frankenphp", "run"]

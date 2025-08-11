# Stage 1: Build frontend (Vite)
FROM node:18 AS node_builder
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 2: Install PHP deps (Composer)
FROM composer:2 AS composer_builder
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
COPY . .
RUN composer dump-autoload --optimize

# Stage 3: FrankenPHP final image
FROM dunglas/frankenphp:1.1-php8.2

RUN install-php-extensions pdo_mysql mbstring exif pcntl bcmath gd zip

WORKDIR /app

COPY --from=composer_builder /app /app
COPY --from=node_builder /app/public /app/public

RUN chown -R www-data:www-data /app && chmod -R 755 /app

EXPOSE 8000
ENV SERVER_NAME=:8000
ENV FRANKENPHP_CONFIG="worker ./public/index.php"

CMD ["php", "vendor/bin/frankenphp", "run"]

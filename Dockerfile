# ============================================================
# Laravel 12 K3 Compliance - FrankenPHP + Vite
# PHP 8.2 | Node.js 22 | PostgreSQL
# ============================================================

# STAGE 1: BUILD FRONTEND
FROM node:22-alpine AS frontend

WORKDIR /app

COPY package.json ./

RUN npm install

COPY . .

RUN npm run build


# STAGE 2: LARAVEL + FRANKENPHP
FROM dunglas/frankenphp:1-php8.2-alpine AS runner

LABEL maintainer="K3 Compliance Team"
LABEL description="Laravel 12 K3 Compliance with FrankenPHP"

WORKDIR /app

# Install PHP extensions
RUN install-php-extensions \
    pdo_pgsql \
    pgsql \
    pdo_mysql \
    pdo_sqlite \
    bcmath \
    opcache \
    zip \
    intl \
    pcntl

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Production environment
ENV APP_ENV=production \
    APP_DEBUG=false \
    PORT=80 \
    SERVER_NAME=":80"

# Install Laravel dependencies
COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

# Copy Laravel source code
COPY . .

# Copy compiled frontend assets
COPY --from=frontend /app/public/build ./public/build

# Optimize Composer and discover Laravel packages
RUN composer dump-autoload --optimize --no-dev --no-scripts \
    && php artisan package:discover --ansi

# Copy Caddy configuration
COPY Caddyfile /etc/caddy/Caddyfile

# Prepare Laravel writable directories
RUN mkdir -p \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/framework/testing \
    storage/logs \
    bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Expose application port
EXPOSE 80

# Start FrankenPHP
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]

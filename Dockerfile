# ==============================================================================
# Dockerfile: Laravel 12 K3 Compliance dengan FrankenPHP (Alpine)
# PHP Version: 8.2 (Kompatibel dengan composer.json ^8.2)
# ==============================================================================

FROM dunglas/frankenphp:1-php8.2-alpine AS runner

# Label metadata
LABEL maintainer="K3 Compliance Team"
LABEL description="Laravel 12 K3 Compliance SaaS with FrankenPHP on Alpine Linux"

# 1. Install ekstensi PHP yang diperlukan (termasuk pdo_pgsql & pgsql untuk PostgreSQL)
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

# 2. Salin binary Composer resmi
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 3. Tentukan direktori kerja aplikasi
WORKDIR /app

# 4. Set environment default untuk runtime
ENV APP_ENV=production \
    APP_DEBUG=false \
    PORT=80 \
    SERVER_NAME=":80"

# 5. Salin composer.json dan composer.lock terlebih dahulu (memanfaatkan Docker cache layer)
COPY composer.json composer.lock ./

# 6. Install dependensi composer untuk production (tanpa dev & script)
RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

# 7. Salin seluruh source code proyek (file rahasia & SQLite dikecualikan lewat .dockerignore)
COPY . .

# 8. Jalankan dump-autoload dan package discovery untuk production
RUN composer dump-autoload --optimize --no-dev \
    && php artisan package:discover --ansi

# 9. Salin konfigurasi Caddyfile ke direktori Caddy
COPY Caddyfile /etc/caddy/Caddyfile

# 10. Siapkan direktori storage & bootstrap/cache serta beri hak akses penuh
RUN mkdir -p \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/testing \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache

# 11. Expose port (Vercel otomatis menghubungkan port ini melalui env $PORT)
EXPOSE 80

# 12. Jalankan FrankenPHP dengan Caddyfile yang telah dikonfigurasi
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]

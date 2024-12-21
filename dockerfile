# Dockerfile
FROM php:8.1-fpm

# Cài đặt các thư viện cần thiết
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libwebp-dev \
    libxpm-dev \
    libavif-dev \
    libicu-dev \
    zlib1g-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd \
        --with-freetype=/usr/include/ \
        --with-jpeg=/usr/include/ \
        --with-webp=/usr/include/ \
    && docker-php-ext-configure intl \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_mysql mbstring xml gd intl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Cài Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Copy mã nguồn
COPY . .

# Thiết lập quyền
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Chạy PHP-FPM
CMD ["php-fpm"]

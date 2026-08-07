FROM php:7.4-fpm

# Copia o composer da imagem oficial dele
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Dependências do sistema e extensões PHP que o Laravel 8 costuma precisar
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

WORKDIR /var/www

EXPOSE 9000
#CMD ["php-fpm"]

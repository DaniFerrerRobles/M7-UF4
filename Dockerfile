# Imagen base de PHP con FPM
FROM php:8.2-fpm

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim unzip git curl \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    mariadb-client \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Instala Composer desde la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo
WORKDIR /var/www

# Copia los archivos de tu proyecto Laravel
COPY . .

# Da permisos a los directorios de Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Instala dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Genera clave si no está definida
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan key:generate || true

# Exponer el puerto que Render espera
EXPOSE 8000

# Comando de arranque
CMD php artisan serve --host=0.0.0.0 --port=8000

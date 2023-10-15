# Используем официальный образ PHP 8.0 и добавляем расширения для работы с Laravel
FROM php:8.1-fpm

RUN apt-get update && \
    apt-get install -y \
    apt-utils \
    libpq-dev \
    libpng-dev \
    libzip-dev \
    zip unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Копируем исходный код проекта в контейнер
COPY . /var/www

WORKDIR /var/www

RUN chown -R www-data:www-data storage/ bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache
# Делаем скрипт исполняемым
RUN ["chmod", "+x", "./docker/dev/docker-entrypoint.sh"]
ENTRYPOINT ["sh", "./docker/dev/docker-entrypoint.sh"]


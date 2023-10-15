#!/bin/bash

if [ ! -f "vendor/autoload" ]; then
    echo "Directory vendor/autoload does not exist. Installing dependencies..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
else
    echo "Directory vendor/autoload exists. Dependencies already installed."
fi


php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
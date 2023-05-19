#!/bin/bash

if [ ! -f "vendor/autoload" ]; then
    echo "Directory vendor/autoload does not exist. Installing dependencies..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
else
    echo "Directory vendor/autoload exists. Dependencies already installed."
fi

# if [ ! -f ".env"]; then
#     echo "Copying the .env file"
#     cp .env.example .env
# else
#     echo ".env file already exists"
# fi

# php artisan ket:generate

# exec docker-php-entrypoint "$@"

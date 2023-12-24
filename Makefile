init:
	git config --local core.hooksPath .githooks
	cp .env.example .env

start:
	composer install --no-interaction --prefer-dist --optimize-autoloader
	php artisan key:generate
	php artisan migrate
	php artisan db:seed

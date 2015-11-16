server:
	php -S localhost:8000 -t public
init:
	cp .env.sample .env
	mkdir database
	touch database/database.sqlite
	composer install
	php artisan db:create
codeception:
	vendor/bin/codecept bootstrap --empty
	vendor/bin/codecept generate:suite api

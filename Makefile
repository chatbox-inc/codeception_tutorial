server:
	php -S localhost:8000 -t public
init:
	cp .env.sample .env
	mkdir database;
	touch database.sqlite
	php artisan db:create
cc:
	vendor/bin/codecept bootstrap
	vendor/bin/codecept generate:suite api

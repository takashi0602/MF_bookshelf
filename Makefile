setup:
	composer install
	npm i
	cp .env.example .env
	php artisan key:generate
	touch ./database/database.sqlite
	php artisan migrate
	php artisan db:seed
	php artisan storage:link
	npm run dev

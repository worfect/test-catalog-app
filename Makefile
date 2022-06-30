d-up:
	docker-compose up -d

d-down:
	docker-compose down

d-build:
	docker-compose up --build -d

d-down-clear:
	docker-compose down -v --remove-orphans

composer-upd:
	docker-compose run --rm cli composer update

cache-clear:
	docker-compose run --rm cli php artisan optimize:clear

m-r-s:
	docker-compose run --rm cli php artisan migrate:refresh --seed

watch:
	docker-compose run --rm node-cli npm run watch

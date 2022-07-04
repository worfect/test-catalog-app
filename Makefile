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

mix-prod:
	docker-compose run --rm node-cli npm run production

######################################################################

build-prod-webserver:
	docker --log-level=debug build --pull --file=docker/poduction/nginx/Dockerfile --tag=${REGISTRY}/webserver:${IMAGE_TAG} .

build-prod-fpm:
	docker --log-level=debug build --pull --file=docker/poduction/fpm/Dockerfile --tag=${REGISTRY}/fpm:${IMAGE_TAG} .

build-prod-cli:
	docker --log-level=debug build --pull --file=docker/poduction/cli/Dockerfile --tag=${REGISTRY}/cli:${IMAGE_TAG} .

build-prod: mix-prod build-prod-webserver build-prod-fpm build-prod-cli

push-prod-webserver:
	docker push ${REGISTRY}/webserver:${IMAGE_TAG}
push-prod-fpm:
	docker push ${REGISTRY}/fpm:${IMAGE_TAG}
push-prod-cli:
	docker push ${REGISTRY}/cli:${IMAGE_TAG}

push-prod: push-prod-webserver push-prod-fpm push-prod-cli

deploy:
	scp -P ${PORT} docker-compose-production.yml ${HOST}:site/docker-compose.yml
	scp -P ${PORT} .env.prod ${HOST}:site/.env
	ssh ${HOST} -p ${PORT} 'cd site && echo "REGISTRY=${REGISTRY}" >> .env'
	ssh ${HOST} -p ${PORT} 'cd site && echo "IMAGE_TAG=${IMAGE_TAG}" >> .env'
	ssh ${HOST} -p ${PORT} 'cd site && docker-compose pull'
	ssh ${HOST} -p ${PORT} 'cd site && docker-compose up --build -d postgres cli'
	ssh ${HOST} -p ${PORT} 'cd site && docker-compose run --rm cli wait-for-it postgres:5432 -t 60'
	ssh ${HOST} -p ${PORT} 'cd site && docker-compose run --rm cli php artisan migrate:refresh --force'
	ssh ${HOST} -p ${PORT} 'cd site && docker-compose run --rm cli php artisan db:seed --force'
	ssh ${HOST} -p ${PORT} 'cd site && docker-compose up --build --remove-orphans -d'

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

######################################################################

build-prod:
	docker --log-level=debug build --pull --file=docker/poduction/nginx/Dockerfile --tag=${REGISTRY}/webserver:${IMAGE_TAG} .
	docker --log-level=debug build --pull --file=docker/poduction/fpm/Dockerfile --tag=${REGISTRY}/fpm:${IMAGE_TAG} .
	docker --log-level=debug build --pull --file=docker/poduction/cli/Dockerfile --tag=${REGISTRY}/cli:${IMAGE_TAG} .

push-prod:
	docker push ${REGISTRY}/webserver:${IMAGE_TAG}
	docker push ${REGISTRY}/fpm:${IMAGE_TAG}
	docker push ${REGISTRY}/cli:${IMAGE_TAG}

deploy:
	ssh ${HOST} -p ${PORT} 'rm -rf site_${BUILD_NUMBER}'
	ssh ${HOST} -p ${PORT} 'mkdir site_${BUILD_NUMBER}'
	scp -P ${PORT} docker-compose-production.yml ${HOST}:site_${BUILD_NUMBER}/docker-compose.yml

	ssh ${HOST} -p ${PORT} 'cd site_${BUILD_NUMBER} && echo "REGISTRY=${REGISTRY}" >> .env'
	ssh ${HOST} -p ${PORT} 'cd site_${BUILD_NUMBER} && echo "IMAGE_TAG=${IMAGE_TAG}" >> .env'
#	ssh ${HOST} -p ${PORT} 'cd site_${BUILD_NUMBER} && docker-compose pull'
#	ssh ${HOST} -p ${PORT} 'cd site_${BUILD_NUMBER} && docker-compose up --build -d postgres cli'
#	ssh ${HOST} -p ${PORT} 'cd site_${BUILD_NUMBER} && docker-compose run cli php artisan migrate:refresh --seed --no-interact'
#	ssh ${HOST} -p ${PORT} 'cd site_${BUILD_NUMBER} && docker-compose up --build --remove-orphans -d'
#	ssh ${HOST} -p ${PORT} 'rm -f site'
#	ssh ${HOST} -p ${PORT} 'ln -sr site_${BUILD_NUMBER} site'

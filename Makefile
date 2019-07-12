up:
	docker-compose up -d --build --remove-orphans

down:
	docker-compose down

init: init-prod-env composer migrate
init-dev: init-dev-env composer migrate

init-prod-env:
	docker-compose exec frontend bash -c "php init --env=Production --overwrite=y"

init-dev-env:
	docker-compose exec frontend bash -c "php init --env=Development --overwrite=n"

composer:
	docker-compose exec frontend bash -c "composer install"

migrate:
	docker-compose exec frontend bash -c "yii migrate --interactive=0"
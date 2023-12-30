CONTAINER_NAME = php-amzmp

up:
	docker-compose --env-file .env up -d

stop:
	docker-compose stop

down:
	docker-compose --env-file .env down

shell:
	docker exec -it $(CONTAINER_NAME) bash

copy-env:
	cp .env.example .env

composer-install:
	docker exec -it $(CONTAINER_NAME) composer install

migrate:
	docker exec -it $(CONTAINER_NAME) php spark migrate

seed:
	docker exec -it $(CONTAINER_NAME) php spark db:seed UserSeeder

setup:
	make copy-env
	make up	
	make composer-install
	make migrate
	make seed
	

CONTAINER_NAME = php

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

migrate:
	docker exec -it $(CONTAINER_NAME) php spark migrate

seed:
	docker exec -it $(CONTAINER_NAME) php spark db:seed UserSeeder


setup:
	make copy-env
	make up	
	make migrate
	make seed
	

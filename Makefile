CONTAINER_NAME = php
ENV_FILE_PATH = .env

up:
	docker-compose --env-file .env up -d

stop:
	docker-compose stop

down:
	docker-compose --env-file .env down

shell:
	docker exec -it $(CONTAINER_NAME) bash

copy-env:
	docker cp .env.example $(CONTAINER_NAME):$(ENV_FILE_PATH)

migrate:
	docker exec -it $(CONTAINER_NAME) php spark migrate

seed:
	docker exec -it $(CONTAINER_NAME) php spark db:seed UserSeeder


setup:
	make up	
	make copy-env
	make migrate
	make seed
	
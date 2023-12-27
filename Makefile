CONTAINER_NAME = php

up:
	docker-compose --env-file .env up -d

stop:
	docker-compose stop

down:
	docker-compose --env-file .env down

shell:
	docker exec -it $(CONTAINER_NAME) bash

seed:
	docker exec -it $(CONTAINER_NAME) php spark db:seed UserSeeder
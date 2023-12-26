up:
	docker-compose --env-file .env up -d

stop:
	docker-compose stop

down:
	docker-compose --env-file .env down
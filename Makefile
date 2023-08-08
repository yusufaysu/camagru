NAME			= camagru
YML_FILE		= ./tools/docker-compose.yml
ENV_FILE		= ./tools/.env

all:
	docker-compose -p $(NAME) -f $(YML_FILE) --env-file $(ENV_FILE) up --build

run:
	./node_modules/@babel/cli/bin/babel.js ./src/public/js/main.js --out-file ./src/public/js/script.js	

tail:
	docker-compose -p $(NAME) -f $(YML_FILE) --env-file $(ENV_FILE) up -d --build

down:
	docker-compose -p $(NAME) -f $(YML_FILE) down

.PHONY: all dev down devdown
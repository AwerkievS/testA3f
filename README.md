## Установка и запуск 

```bash

cp .env.example .env

docker-compose build 

docker-compose up -d 

docker-compose exec -ti workspace composer install

```
Just download the repository, modify docker-compose.yml and .env to your preference and run `docker-compose up -d` and then in the container run `composer install` and `php artisan migrate`.


To enter the container execute: `docker exec -ti testPhp bash`

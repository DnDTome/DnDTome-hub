# DnDTome Hub - API

This is the API project for DnDTome Hub.

## `Setup`

### `Local Development`

The project runs on docker from laradock

First time you run the project do the following

From root dir `cd laradock`

Run `cp env-example .env`

Open .env and set PMA_DB_ENGINE=mysql to PMA_DB_ENGINE=mariadb

Depending on the host’s operating system you may need to change the value given to COMPOSE_FILE. When you are running Laradock on Mac OS the correct file separator to use is :. When running Laradock from a Windows environment multiple files must be separated with ;

Run `cp php-worker/supervisord.d/laravel-scheduler.conf.example laradock/php-worker/supervisord.d/laravel-scheduler.conf`

Run `cp php-worker/supervisord.d/laravel-worker.conf.example php-worker/supervisord.d/laravel-worker.conf`

Run `docker-compose up -d nginx mariadb redis phpmyadmin php-worker`

Run `docker-compose exec --user=laradock workspace bash`

Run `composer install`

Dont close the terminal down

In you ide in Root dir copy .env.example to .env (if .env doesnt exists create it)

Back in the terminal

Run `php artisan jwt:secret`

Run `php artisan migrate`


### `Next Time`

Run `docker-compose up -d nginx mariadb redis phpmyadmin php-worker`

Run `docker-compose exec --user=laradock workspace bash`
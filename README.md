# DnDTome Hub - API

This is the API project for DnDTome Hub.

## `Setup`

### `Local Development`

The project runs on docker from laradock. Laradock are added as a submodule, so before starting

Run `git submodule update` - this will pull down the laradock repo instead of folder being an empty reference

First time you run the project do the following

From root dir `cd laradock`

Run `cp env-example .env`

Open .env and set PMA_DB_ENGINE=mysql to PMA_DB_ENGINE=mariadb

Depending on the host’s operating system you may need to change the value given to COMPOSE_FILE. When you are running Laradock on Mac OS the correct file separator to use is :. When running Laradock from a Windows environment multiple files must be separated with ;

Run `cp php-worker/supervisord.d/laravel-scheduler.conf.example laradock/php-worker/supervisord.d/laravel-scheduler.conf`

Run `cp php-worker/supervisord.d/laravel-worker.conf.example php-worker/supervisord.d/laravel-worker.conf`

Run `docker-compose up -d nginx mariadb redis phpmyadmin php-worker workspace`

Run `docker-compose exec --user=laradock workspace bash`

Run `composer install`

Dont close the terminal down

In you ide in Root dir copy .env.example to .env (if .env doesnt exists create it)

Back in the terminal

Run `php artisan migrate`

Run `php artisan passport:install`

### `Next Time`

Run `docker-compose up -d nginx mariadb redis phpmyadmin php-worker workspace`

Run `docker-compose exec --user=laradock workspace bash`

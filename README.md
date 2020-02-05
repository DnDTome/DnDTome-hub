## DnDTome site

This is the API project for DnDTome Hub
### `Setup`
First time you run the project do the following

Run docker-compose up --build -d

Run docker-compose exec app bash ( enters the contrainer)

Run composer install

Now copy .env.example to .env (if .env doesnt exists create it)

Run php artisan jwt:secret

Run php artisan migrate


### `Run`

Run docker-compose up -d

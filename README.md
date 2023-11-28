# ☀️ meteo

## Dockerfile
This project uses [PHP Docker official image](https://hub.docker.com/_/php) for local development.
```
docker build -t localdev .
docker run -d --rm -p 80:80 -v "$PWD/src":/var/www/html --name running localdev
docker exec -it running bash
```

into Docker install the dependencies:
```
root@a8b86019f174:/var/www/html# cd Meteo/
root@a8b86019f174:/var/www/html/Meteo# composer install
```

and prepare the `dev` environment:
```
root@a8b86019f174:/var/www/html/Meteo# php artisan app:prepare dev
Preparing dev ...
Done!
```

Using **macOS** we configured this local host `host.docker.internal` for your local database:
```
DB_CONNECTION=mysql
DB_HOST=host.docker.internal
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=pass
```

Create the tables into the existing database:
```
root@a8b86019f174:/var/www/html/Meteo# php artisan migrate
```

Open this link http://127.0.0.1/Meteo/

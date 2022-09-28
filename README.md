
# Setup


```sh
cp .env.example .env
```

```sh
docker-compose up -d
```

```sh
docker-compose exec axilweb-app-container composer install
```

```sh
docker-compose exec axilweb-app-container php artisan key:generate
```

```sh
docker-compose exec axilweb-app-container php artisan migrate --seed
```

```sh
docker-compose exec axilweb-app-container php artisan passport:install
```
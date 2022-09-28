
# Setup


```sh
cp .env.example .env
```

```sh
docker-compose up -d
```

```sh
docker-compose exec app composer install
```

```sh
docker-compose exec app php artisan key:generate
```

```sh
docker-compose exec app php artisan passport:install
```
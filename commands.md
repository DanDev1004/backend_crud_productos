### Levantar servicio
docker compose up -d --build

### Ejecutar migraciones
docker compose exec app php artisan migrate

### Ejecutar seeders
docker compose exec app php artisan db:seed

### Ingresar a la db
docker compose exec mysql mysql -u laravel -p crud_productos
password: laravel123
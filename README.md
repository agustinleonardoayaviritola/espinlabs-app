# PRUEBA TECNICA
example with LARAVEL, mysql and docker composer
# Installation sin Docker

```
git clone https://github.com/agustinleonardoayaviritola/reservas.git
cd reservas
1. composer install
2. copiar el archivo .env.example con el nombre .env
3. generar la llave para la aplicacion 
php artisan key:generate
5. realizar la migracion correspondiente
php artisan migrate:fresh --seed
6. levantar el proyecto 
php artisan serve
```
# Installation con Docker. 
```
git clone https://github.com/agustinleonardoayaviritola/reservas.git
cd reservas
1. composer install
2. copiar el archivo .env.example con el nombre .env
3. generar la llave para la aplicacion 
php artisan key:generate
5. levantar el proyecto 
./vendor/bin/sail up
6. realizar la migracion correspondiente
./vendor/bin/sail artisan migrate:fresh --seed  
```
# credenciales para acceder a la aplicacion

```
usuario: admin@admin.com
password: admin
```

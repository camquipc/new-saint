# New-saint
Sistema para el control del incidentes
## Requerimientos 

- PHP >= 5.6.4
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Composer
- Postgresql >= 12.6

## Instalación 

Por git mediante clonacion del repositorio 

Clonar el repositorio
```ssh
git clone https://github.com/camquipc/new-saint.git
```
Moverse a la carpeta generada
```ssh
cd new-saint
```
## Configuración

Copiar el archivo .env.example  a un archivo .env

```ssh
cp .env.example .env
```
Confingurar las variables de la BD del archivo .env

```ssh
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nombre_de_bd
DB_USERNAME=nombre_usuario
DB_PASSWORD=clave_usada
```
## General la key del sistema
```ssh
php artisan key:generate
```
## Ejecutar las migraciones
```ssh
php artisan migrate
```
## Ejecutar los seed para incializar BD
```ssh
php artisan db:seed
```
## Correr el servidor en modo Desarrollo
```ssh
php artisan serve
```

## Ejecutar el sistema en prod

Seguir documentación segun el sistema operativo [link tutorial simple](https://ourcodeworld.co/articulos/leer/584/como-configurar-un-virtualhost-para-un-proyecto-laravel-en-xampp-para-windows)

Una vez que hayan sido registrado los datos iniciales del sistema, 
se puede autenticar en el mismo con los siguientes datos de acceso como sudo admin 

usuario: admin
clave: admin




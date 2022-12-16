# Backend MarketCity


Proyecto APi REST de Marketcity desarrollada con ORACLE y Storage Procedures, aquí encontraras la instalacion y las versiones que se necesitan para la instalacion, adicional, varios de los enpoints del aplicativo con su funcionamiento .

## Tecnologias

- [PHP] - PHP 7.4.28
- [Laravel] - Laravel

## Instalacion

Clonar del repositorio
```sh
git clone https://github.com/cgrisales04/back-marketcity.git
```
Necesitas composer [Composer](https://getcomposer.org/) a version de [PHP]
Instala todas las dependencias, en el proyecto raiz ejecuta.

```sh
composer install
```

Base de datos
```sh
Base de datos creada en Oracle y funcionando con la ejecucion de Storage Procedure
recuerda que debes modificar las variables de entorno de XAMPP para su funcionamiento
ya el proyecto cuenta con la configuración para la conexion Oracle - PHP
```

Compilar el proyecto necesitas ejecutar el codigo a nivel del proyecto raiz desde la consola
```sh
php artisan serve
```

## Aportadores

Cristian Grisales Venitez

[Laravel]: <https://laravel.com/docs/8.x/readme>
[PHP]: <https://www.apachefriends.org/es/download.html>
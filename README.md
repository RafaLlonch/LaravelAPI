<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## LaravelApi dados

Cuando se registra un usuario sin nickname se le asigna el nombre Ánonimo y se le asigna el rol de user, con el que puede hacerlo todo menos borrar las jugadas de un jugador, que solo lo puede hacer un admin.

Para asignar el rol de admin se puede hacer desde postman o desde phpMyAdmin.

La ruta de tirar dados y la de modificar nombre de un jugador están restringidas únicamente al usuario autentificado en ese momento, porque sólo él, puede tirar sus dados y sólo él puede modificar su nickname.

Una vez corridas las migraciones hay que correr el comando $php artisan passport:install para que cree las rutas que generaran los tokens de OAuth2.

He probado con el test passportAuthController la ruta de login.




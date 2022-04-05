## LaravelApi dados

Cuando se registra un usuario sin nickname se le asigna el nombre Ánonimo y se le asigna el rol de user, con el que puede hacerlo todo menos borrar las jugadas de un jugador, que solo lo puede hacer un admin.

Para asignar el rol de admin se puede hacer desde postman o desde phpMyAdmin.

La ruta de tirar dados y la de modificar nombre de un jugador están restringidas únicamente al usuario autentificado en ese momento, porque sólo él, puede tirar sus dados y sólo él puede modificar su nickname.

Una vez corridas las migraciones hay que correr el comando $php artisan passport:install para que cree las rutas que generaran los tokens de OAuth2.

He creado los tests de acceso a la aplicación en el archivo tests/Feature/AuthTest. En ellos de comprueban el registro, el login y los posibles casos de error de registro y de inicio de sesión.





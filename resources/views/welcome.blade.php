<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center mt-5">Api Rest Tirar dados</h1>
    <div class="container">
	    <div class="mt-4">             
			<p>
                Para registrar un jugador es imprescindible introducir el mail y un password de mínimo 8 
                carácteres.
                Cuando se registra un usuario sin nickname se le asigna el 
                nombre Ánonimo y se le asigna el rol de user, con el que puede hacerlo todo menos borrar
                las jugadas de un jugador, que solo lo puede hacer un admin.
            </p>
            <p>
                Para asignar el rol de admin se puede hacer desde postman o desde phpMyAdmin.
            </p>
            <p>
                La ruta de tirar dados y la de modificar nombre de un jugador están restringidas únicamente 
                al usuario autentificado en ese momento, porque sólo él, puede tirar sus dados y sólo él 
                puede modificar su nickname.
            </p>
            <p>
                He creado los tests de acceso a la aplicación en el archivo tests/Feature/AuthTest. En ellos 
                de comprueban el registro, el login y los posibles casos de error de registro y de inicio de 
                sesión.
            </p>
            <p>
                En la carpeta doc del proyecto se encuentra el modelo relacional de la base de datos y el json
                de la colección de pruebas de postman.
            </p>
		</div>
        <div class="mt-5">
            <h4>Rutas de mi aplicación (end-points):</h4>
        </div>
        <table class="table mt-4 mb-10">
            <thead>
              <tr>
                <th scope="col">Acción</th>
                <th scop="col">Método</th>
                <th scope="col">end-point</th>
                <th scope="col">Response</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">Registro</td>
                <td>POST</td>
                <td>dados-api.tk/api/players</td>
                <td>json del nuevo usuario</td>
              </tr>
              <tr>
                <td scope="row">Login</td>
                <td>POST</td>
                <td>dados-api.tk/api/login</td>
                <td>token de acceso</td>
              </tr>
              <tr>
                <td scope="row">Modifica el nombre de un jugador</td>
                <td>PUT</td>
                <td>dados-api.tk/api/players/id</td>
                <td>json del usuario modificado</td>
              </tr>
              <tr>
                <td scope="row">Un jugador realiza una tirada</td>
                <td>POST</td>
                <td>dados-api.tk/api/players/id/games</td>
                <td>json de la tirada</td>
              </tr>
              <tr>
                <td scope="row">Elimina las tiradas de un jugador</td>
                <td>DELETE</td>
                <td>dados-api.tk/api/players/id/games</td>
                <td>json de la tirada</td>
              </tr>
              <tr>
                <td scope="row">Listado de jugadores con el % de éxito</td>
                <td>GET</td>
                <td>dados-api.tk/api/players</td>
                <td>json con el listado de jugadores</td>
              </tr>
              <tr>
                <td scope="row">Ver tiradas de un jugador (id)</td>
                <td>GET</td>
                <td>dados-api.tk/api/players/id/games</td>
                <td>json con las tiradas del jugador</td>
              </tr>
              <tr>
                <td scope="row">Ránking medio de todos los jugadores</td>
                <td>GET</td>
                <td>dados-api.tk/api/players/ranking</td>
                <td>json con el % medio de éxito</td>
              </tr>
              <tr>
                <td scope="row">Peor jugador</td>
                <td>GET</td>
                <td>dados-api.tk/api/players/ranking/loser</td>
                <td>json con el id del peor jugador</td>
              </tr>
              <tr>
                <td scope="row">Mejor jugador</td>
                <td>GET</td>
                <td>dados-api.tk/api/players/ranking/winner</td>
                <td>json con el id del mejor jugador</td>
              </tr>
            </tbody>
          </table>
	</div>
    <div>
        <h1 class="text-white">espacio</h1>
    </div>
</body>
</html>

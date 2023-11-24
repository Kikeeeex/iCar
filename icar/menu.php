<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú de Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #607d8b; /* Gris claro */
            color: #000; /* Negro */
            display: flex;
    justify-content: center;
    align-items: center;
        }

        .container {
            text-align: center;
            margin-top: 50px;
        }

        h2 {
            color: #000; /* Negro */
            margin-top: 170px;
        }

        .list-group-item {
            background-color: #fff; /* Blanco */
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Menú de Registro</h2>
    <br><br><br>
    <ul class="list-group">
        <li class="list-group-item"><a href="clientes.php">Registro de Clientes</a></li> <br><br>
        <li class="list-group-item"><a href="mecanicos.php">Registro de Mecánicos</a></li> <br><br>
        <li class="list-group-item"><a href="vehiculos.php">Registro de Vehículos</a></li> <br><br>
    </ul>

    <a  href="cerrarsesion.php">
       <button type="" style="background-color:  #000000; color: white; !important">Cerrar Sesión</button>
       <br>
       <br>
    </a> 

</div>

</body>
</html>


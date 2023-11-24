<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Vehiculos</title>
    <link rel="stylesheet" href="css/estilos2.css?v=<php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
</head>

<script>
    $(document).ready(function() {
        $('#formulario').submit(function(event) {
            event.preventDefault();

            var matricula = $('#matricula').val();
            var anio = $('#anio').val();
            var marca = $('#marca').val();
            var modelo = $('#modelo').val();
            var tipo = $('#tipo').val();
            
            var data = {
                "matricula": matricula,
                "anio": anio,
                "marca": marca,
                "modelo": modelo,
                "tipo": tipo
            };

            $.ajax({
                url: 'insertarV.php',
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log(response);
                    document.getElementById("response").innerHTML = response;
                }
            });
        });
    });
</script>

<body style= "background-color: #607d8b; !important">
    <h1 align="center" style="color: #FFFFFF !important">REGISTRO DE VEHICULOS</h1> 
    <form id="formulario" method="POST" align="center"> 

        <label for="matricula">Matricula del vehiculo:</label> 
        <input type="text" id="matricula" name="matricula"  required><br><br>

        <label for="marca">Marca del vehiculo:</label> 
        <input type="text" id="marca" name="marca"  required><br><br>

        <label for="modelo">Modelo del vehiculo:</label> 
        <input type="text" id="modelo" name="modelo"  required><br><br>

        <label for="tipo">Tipo del vehiculo:</label> 
        <input type="text" id="tipo" name="tipo"  required><br><br>

        <label for="anio">Año del vehiculo:</label> 
        <input type="text" id="anio" name="anio"  required><br><br>
 
        <button type="submit" style="background-color:  #000000; color: white; !important">Guardar</button>
        <button type="reset" style="background-color:  #000000; color: white; !important">Limpiar</button>
        
    </form>

    <br><br> 
 
    <h2 align="center" style="color: #FFFFFF !important">LISTA DE MECANICOS REGISTRADOS</h2> 
    <div id="lista_llenados" align="center" > 

    <table border="2" style="text-align:center;background-color: rgb(252, 252, 252) !important;  border-color:#269e98">
        <tr>
            <th>Matricula</th>
            <th>Año</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Tipo</th>
            
        </tr> 
    <tbody id="response"></tbody>
    </table><br> <br> <br>

    <a href="fpdf/ReporteRegistrosV.php"  target="_blank" >
       <button type="submit" style="background-color:  #000000; color: white; !important">Generar reporte</button>
    </a> 

    <a  href="cerrarsesion.php">
       <button type="" style="background-color:  #000000; color: white; !important">Cerrar Sesión</button>
       <br>
       <br>
    </a> 

    
    

</body>
</html>
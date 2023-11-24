<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes</title>
    <link rel="stylesheet" href="css/estilos2.css?v=<php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
</head>

<script> 
        $(document).ready(function() { 

            $('#formulario').submit(function(event) { 
                event.preventDefault(); 

                var cedulaC = $('#cedulaC').val();
                var nombreC = $('#nombreC').val();
                var telefonoC = $('#telefonoC').val(); 
                var data =

                {   
                    "cedulaC" : $('#cedulaC').val(),
                    "nombreC" : $('#nombreC').val(),
                    "telefonoC" : $('#telefonoC').val(),
                    
                }
                
                $.ajax({ 
                    url: 'insertarC.php', 
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

<body style= "background-color: #607d8b; font-family: ; !important">
    <h1 align="center" style="color: #FFFFFF !important">REGISTRO DE CLIENTES</h1> 
    <form id="formulario" method="POST" align="center"> 

        <label for="cedulaC">Cedula del cliente:</label> 
        <input type="text" id="cedulaC" pattern="[0-9]*" min="7" max="8" name="cedulaC"  required><br><br>

        <label for="nombreC">Nombre del cliente:</label> 
        <input type="text" id="nombreC" name="nombreC"  required><br><br>

        <label for="telefonoC">Telefono del cliente:</label> 
        <input type="text" id="telefonoC" name="telefonoC"  required><br><br>
 
        <button type="submit" style="background-color:  #000000; color: white; !important">Guardar</button>
        <button type="reset" style="background-color:  #000000; color: white; !important">Limpiar</button>
        
    </form>

    <br><br> 
 
    <h2 align="center" style="color: #FFFFFF !important">LISTA DE CLIENTES REGISTRADOS</h2> 
    <div id="lista_llenados" align="center"> 

    <table border="2" style="text-align:center;background-color: rgb(252, 252, 252) !important;  border-color:#269e98">
        <tr>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Telefono</th>
        </tr> 
    <tbody id="response"></tbody>
    </table><br> <br> <br>

    <a href="fpdf/ReporteRegistrosC.php"  target="_blank">
       <button type="submit" style="background-color:  #000000; color: white; !important">Generar reporte</button>
    </a> 

    <a  href="cerrarsesion.php">
       <button type="" style="background-color:  #000000; color: white; !important">Cerrar Sesión</button>
       <br>
       <br>
    </a> 

    
    

</body>
</html>
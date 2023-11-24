<?php 
include_once('con_db.php');

    $matricula = $_POST['matricula'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tipo = $_POST['tipo'];
    $anio = $_POST['anio'];

        $query = "insert into vehiculos(matricula, marca, modelo, tipo, anio) values ('$matricula','$marca','$modelo','$tipo','$anio')"; 
        $resultado = mysqli_query($conn, $query);
 
        $query = "SELECT * FROM vehiculos"; 
        $resultado = mysqli_query($conn, $query);
 
        while ($fila = mysqli_fetch_assoc($resultado)) { 
            ?>
                <tr> 
                    <td><?php echo $fila['matricula']; ?> </td>
                    <td><?php echo $fila['marca']; ?> </td>
                    <td><?php echo $fila['modelo']; ?> </td>
                    <td><?php echo $fila['tipo']; ?> </td>
                    <td><?php echo $fila['anio']; ?> </td>
    
                 </tr> 
            <?php
            
                } 
?>  
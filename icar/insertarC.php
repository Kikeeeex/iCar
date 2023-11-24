<?php 
include_once('con_db.php');

    $cedulaC = $_POST['cedulaC'];
    $nombreC = $_POST['nombreC'];
    $telefonoC = $_POST['telefonoC'];

        $query = "insert into clientes(cedulaC, nombreC, telefonoC) values ('$cedulaC','$nombreC','$telefonoC')"; 
        $resultado = mysqli_query($conn, $query);
 
        $query = "SELECT * FROM clientes"; 
        $resultado = mysqli_query($conn, $query);
 
        while ($fila = mysqli_fetch_assoc($resultado)) { 
            ?>
                <tr> 
                    <td><?php echo $fila['cedulaC']; ?> </td>
                    <td><?php echo $fila['nombreC']; ?> </td>
                    <td><?php echo $fila['telefonoC']; ?> </td>
    
                 </tr> 
            <?php
            
                } 
?>       
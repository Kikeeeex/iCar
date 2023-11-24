<?php 
include_once('con_db.php');

    $cedulaM = $_POST['cedulaM'];
    $nombreM = $_POST['nombreM'];
    $telefonoM = $_POST['telefonoM'];

        $query = "insert into mecanicos(cedulaM, nombreM, telefonoM) values ('$cedulaM','$nombreM','$telefonoM')"; 
        $resultado = mysqli_query($conn, $query);
 
        $query = "SELECT * FROM mecanicos"; 
        $resultado = mysqli_query($conn, $query);
 
        while ($fila = mysqli_fetch_assoc($resultado)) { 
            ?>
                <tr> 
                    <td><?php echo $fila['cedulaM']; ?> </td>
                    <td><?php echo $fila['nombreM']; ?> </td>
                    <td><?php echo $fila['telefonoM']; ?> </td>
    
                 </tr> 
            <?php
            
                } 
?>       
<?php 
include_once('con_db.php');

if(isset($_POST['matricula']) && isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['tipo']) && isset($_POST['anio'])) {
    $matricula = $_POST['matricula'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tipo = $_POST['tipo'];
    $anio = $_POST['anio'];

    $query = "INSERT INTO vehiculos(matricula, marca, modelo, tipo, anio) VALUES ('$matricula','$marca','$modelo','$tipo','$anio')"; 
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        // Consulta para obtener la lista actualizada de vehículos
        $query_select = "SELECT * FROM vehiculos"; 
        $resultado_select = mysqli_query($conn, $query_select);

        // Mostrar la tabla de resultados
        while ($fila = mysqli_fetch_assoc($resultado_select)) { 
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
    } else {
        echo "Error al insertar el registro: " . mysqli_error($conn);
    }
} else {
    echo "Error: No se recibieron todos los datos necesarios.";
}
?>



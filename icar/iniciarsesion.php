<?php
session_start();
include("con_db.php");

if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Usuario = validate($_POST['usuario']);
    $Contraseña = validate($_POST['contraseña']);

    if(empty($Usuario)){
        header("Location: index.php?error=El Usuario es requerido");
        exit();
    } elseif(empty($Contraseña)){
        header("Location: index.php?error=La Contraseña es requerida");
        exit();
    } else{
        //$Contraseña  = md5($Contraseña);

        $Sql = "SELECT * FROM usuarios WHERE usuario = '$Usuario' AND contrasena = '$Contraseña'";
        echo $Sql;
        $result = mysqli_query($conn, $Sql) or die(mysqli_error($conn));

        if(mysqli_num_rows ($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['usuario'] === $Usuario && $row['contrasena'] === $Contraseña){
                $_SESSION['usuario'] = $row['usuario'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['id'] = $row['id'];
                header("Location: menu.php");
                exit();
            }else{
                header("Location: index.php?error=El usuario o contraseña son incorrectas");
                exit();
            }

        } else{
            header("Location: index.php?error=El usuario o contraseña son incorrectas");
            exit();
        }
    }


} else {
    header("Location: index.php");
    exit();
}

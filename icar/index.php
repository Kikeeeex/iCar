<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iCar Plus</title>
    <!-- iconos font-awesome -->
    <script src="https://kit.fontawesome.com/9d0ecd6d4d.js" crossorigin="anonymous"></script>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <div class="container">
        <form action="iniciarsesion.php" method="POST">
            <h1>iCar Plus</h1>
            <?php
            if(isset($_GET['error'])){
            ?>
            <p class="error">
                <?php
                echo $_GET['error']
                ?>
            </p>
            <?php
            }
            ?>
            <div class="form__group form__div">
                <span><i class="fa-solid fa-circle-user"></i></span>
                <input class="campo" type="text" placeholder="Usuario">
            </div>
            <div class="form__group form__div">
                <span><i class="fa-solid fa-lock"></i></span>
                <input class="campo" type="password" placeholder="Contraseña">
            </div>
            <div class="form__group">
                <button type="submit">Acceso</button>
            </div>
        </form>
        <hr>
        
    </div>


    <script src="js/main.js"></script>
</body>

</html>

<!-- 



 -->
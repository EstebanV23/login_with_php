<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="../static/img/18961875.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/> 
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/estilos-generales.css">
    <link rel="stylesheet" href="../static/css/estilos-home.css">
    <title>Home</title>
</head>
<body>
    <?php include_once "./cabecero.php"; ?>
    <!-- Contenido principal con toda la info -->
    <main class="centrar">
        <h1>BIENVENIDO <?= $_SESSION['username'] ?></h1>
    </main>
    <!-- Fin del contenido principal -->
    <footer>

    </footer>
</body>
</html>
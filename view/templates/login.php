<?php

session_start();

if(isset($_SESSION['username'])){
    header("Location: home.php");
}

$mensaje_username = $_GET['mensaje_username'] ?? '';
$mensaje_password = $_GET['mensaje_password'] ?? '';

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
    <link rel="stylesheet" href="../static/css/estilos-login.css">
    <title>Login</title>
</head>
<body class="background-principal">
    
    <?php include_once 'cabecero.php'; ?>

    <!-- Contenido principal con toda la info -->
    <main class="centrar">
        <!-- Contenedor de informacion general -->
        <div class="contenedor-info">
            <!-- Contenido arriba con imagen y un subtitulo -->
            <div class="info-top">
                <div class="top-imagen">
                    <img src="../static/img/18961875.jpg" alt="Logo">
                </div>
                <h2 class="top-subtitulo">LOGIN</h2>
            </div>
            <!-- Fin del contenido arriba -->

            <!-- Contendio de abajo con el formulario -->
            <div class="info-bottom">
                <!-- Formulario -->
                <form action="../../controllers/login-controller.php" class="bottom-formulario" method="POST">
                    <!-- Contendor de inputs, estilos generales para todos -->
                    <!-- NOMBRE DE USUARIO -->
                    <div class="formulario-contenedor">
                        <label for="username">Nombre de usuario: </label>
                        <input autocomplete="off" type="text" name="username" id="username" placeholder="Ejemplo: MiaGamer04" required>
                        <i class="material-symbols-outlined">stadia_controller</i>
                        <p id="mensajeUsername" class="error"><?= $mensaje_username ?></p>
                    </div>
                    <!-- CONTRASEÑA -->
                    <div class="formulario-contenedor">
                        <label for="password">Contraseña: </label>
                        <input autocomplete="off" type="password" name="password" id="password" placeholder="************" required>
                        <i class="material-symbols-outlined">lock</i>
                        <span class="material-symbols-outlined" id="visibilidad">visibility</span>
                        <p id="mensajePassword" class="error"><?= $mensaje_password ?></p>
                    </div>
                    <div class="formulario-contenedor">
                        <button type="button" name="envio" onclick="validar()" class="botones-enviar" id="enviar">Iniciar Sesión</button>
                    </div>
                    <div class="formulario-contenedor links-row">
                        <a href="#" class="link-password">Olvidaste tu contraseña?</a>
                        <a href="./registro.php" class="link-password">Regístrate</a>
                    </div>
                    <!-- Fin del contenedor de inputs -->
                </form>
                <!-- Fin del formulario -->
            </div>
            <!-- Find el contenedor abajo -->
        </div>
        <!-- Fin del contenedor con informacion general -->
    </main>
    <!-- Fin del contenido principal -->
    <footer>

    </footer>
    <script src="../static/js/validaciones.js"></script>
</body>
</html>
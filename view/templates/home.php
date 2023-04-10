<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="/view/static/img/18961875.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/> 
    <link rel="stylesheet" href="/view/static/css/normalize.css">
    <link rel="stylesheet" href="/view/static/css/estilos-generales.css">
    <link rel="stylesheet" href="/view/static/css/estilos-home.css">
    <title>Home</title>
</head>
<body>
    <?php include_once "cabecero.php"; ?>
    <!-- Contenido principal con toda la info -->
    <main class="centrar">
        <div class="banner">
            <?php if(isset($_SESSION["nombre"])): ?>
                <h2 class="bienvenida">BIENVENIDO <?= $_SESSION['nombre'] ?></h2>
            <?php else: ?>
                <h2 class="bienvenida">SOMOS DEVGAME</h2>
            <?php endif; ?>
        </div>
        <div class="contenedor-general">
            <h1 class="titulo">Nosotros</h1>
            <div class="contenido">
                <div class="contenido-texto">
                    <p>
                        Somos una compañia a nivel nacional, distribuidora de componentes electrónicos y accesorios para todo tipo de consolas, con un enfoque gamer, brindando así calidad y seguridad en nuestros productos, siempre dispuestos para nuestros clientes
                    </p>
                </div>
                <div class="contenido-img">
                    <img src="/view/static/img/nosotros.jpg" alt="imagen">
                </div>
            </div>
        </div>
    </main>
    <!-- Fin del contenido principal -->
    <footer>

    </footer>
</body>
</html>
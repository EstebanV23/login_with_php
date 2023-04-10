<?php 
if (!isset($_SESSION)) {
    session_start();
}

$sessiones_permitidas = [2, 3, 4];

?>
<!-- Cabecero con navegacion -->
<header class="navegacion">
    <!-- Navegacion -->
    <nav class="navegacion-contenido">
        <a href="home.php">Home</a>
        <?php if(!isset($_SESSION['username'])): ?>
            <a href="login.php">Login</a>
        <?php else: ?>
            <a href="/controllers/cerrar-session-controller.php">Logout</a>
            <a href="calculadora-aritmetica/index.php">Calculadora</a>
        <?php endif; 
        if(in_array($_SESSION["rol"], $sessiones_permitidas)):?>
        <a href="./administrar.php">Administrar</a>
        <?php endif; ?>
    </nav>
    <!-- Fin navegacion -->
</header>
<!-- Fin del cabecero -->
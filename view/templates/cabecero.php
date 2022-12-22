<?php 

session_start();

?>
<!-- Cabecero con navegacion -->
<header class="navegacion">
    <!-- Navegacion -->
    <nav class="navegacion-contenido">
        <a href="./home.php">Home</a>
        <?php if(!isset($_SESSION['username'])): ?>
            <a href="./login.php">Login</a>
        <?php else: ?>
            <a href="../../controllers/cerrar-session-controller.php">Logout</a>
            <a href="./calculadora-aritmetica/index.php">Calculadora</a>
        <?php endif; 
        if($_SESSION['rol'] == 2 || $_SESSION['rol'] == 3):?>
        <a href="./administrar.php">Administrar</a>
        <?php endif; ?>
    </nav>
    <!-- Fin navegacion -->
</header>
<!-- Fin del cabecero -->
<?php 

session_start();

?>
<!-- Cabecero con navegacion -->
<header class="navegacion">
    <!-- Navegacion -->
    <nav class="navegacion-contenido">
        <a href="./home.php">Home</a>
        <a href="./calculadora-aritmetica/index.php">Calculadora</a>
        <?php if(!isset($_SESSION['username'])): ?>
        <a href="./login.php">Login</a>
        <?php else: ?>
        <a href="../../controllers/cerrar-session.php">Logout</a>
        <?php endif; 
        if($_SESSION['rol'] == 2):?>
        <a href="./administrar.php">Administrar</a>
        <?php endif; ?>
    </nav>
    <!-- Fin navegacion -->
</header>
<!-- Fin del cabecero -->
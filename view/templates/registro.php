<?php

session_start();

include "../../helpers/validaciones.php";

$validacion = new Validaciones();

$mensaje = "none";
$estado = "none";

if (isset($_GET["estado"])) {
    $existen_datos = $validacion->validarEntradas($_GET["estado"], $_GET["mensaje"]);
}

if(isset($existen_datos)) 
{
    list($estado, $mensaje) = array_values($_GET);
}
?>

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
    <link rel="stylesheet" href="/view/static/css/estilos-login.css">
    <link rel="stylesheet" href="/view/static/css/estilos-registro.css">
    <title>Registro</title>
</head>
<body class="background-principal">
    
    <?php include 'cabecero.php'; ?>

    <!-- Contenido principal con toda la info -->
    <main class="centrar">
        <!-- Contenedor de informacion general -->
        <div class="contenedor-info">
            <!-- Contenido arriba con imagen y un subtitulo -->
            <a href="login.php" class="info-volver">
                <i class="material-symbols-outlined">arrow_back</i>
                <p>Volver</p>
            </a>
            <div class="info-top">
                <div class="top-imagen">
                    <img src="/view/static/img/18961875.jpg" alt="Logo">
                </div>
                <h2 class="top-subtitulo">REGISTRO</h2>
            </div>
            <!-- Fin del contenido arriba -->

            <!-- Contendio de abajo con el formulario -->
            <div class="info-bottom">
                <!-- Formulario -->
                <form action="/controllers/registro-controller.php" method="POST" class="bottom-formulario">
                    <!-- Contendor de inputs, estilos generales para todos -->
                    <!-- NOMBRE-->
                    <div class="formulario-contenedor">
                        <label for="nombre">Nombre: </label>
                        <input maxlength="49" autocomplete="off" type="text" name="nombre" id="nombre" placeholder="Mia Sofia" required>
                        <i class="material-symbols-outlined">person_4</i>
                        <p id="mensajeNombre"></p>
                    </div>
                    <!-- APELLIDO -->
                    <div class="formulario-contenedor">
                        <label for="apellido">Apellido: </label>
                        <input maxlength="49" autocomplete="off" type="apellido" name="apellido" id="apellido" placeholder="Villamizar Zabala" required>
                        <i class="material-symbols-outlined">face</i>
                        <p id="mensajeApellido"></p>
                    </div>
                    <!-- APELLIDO -->
                    <div class="formulario-contenedor">
                        <label for="email">Email: </label>
                        <input maxlength="99" autocomplete="off" type="text" name="email" id="email" placeholder="Ejemplo@correo.com" required>
                        <i class="material-symbols-outlined">mail</i>
                        <p id="mensajeEmail"></p>
                    </div>
                    <!-- NOMBRE DE USUARIO -->
                    <div class="formulario-contenedor">
                        <label for="username">Nombre de usuario: </label>
                        <input maxlength="49" autocomplete="off" type="text" name="username" id="username" placeholder="Ejemplo: MiaGamer04" required>
                        <i class="material-symbols-outlined">stadia_controller</i>
                        <p id="mensajeUsername"></p>
                    </div>
                    <!-- CONTRASEÑA -->
                    <div class="formulario-contenedor">
                        <label for="password">Contraseña: </label>
                        <input maxlength="49" autocomplete="off" type="password" name="password" id="password" placeholder="Micontraseña32?!" required>
                        <i class="material-symbols-outlined">lock</i>
                        <span class="material-symbols-outlined" id="visibilidad">visibility</span>
                        <p id="mensajePassword"></p>
                    </div>
                    <!-- CONTRASEÑA CONFIRMACION -->
                    <div class="formulario-contenedor">
                        <label for="passwordConfirmada">Confirmar Contraseña: </label>
                        <input maxlength="49" autocomplete="off" type="password" id="passwordConfirmada" placeholder="Micontraseña32?!" required>
                        <i class="material-symbols-outlined">lock</i>
                        <p id="mensajePasswordConfirmada"></p>
                    </div>
                    <div class="formulario-contenedor linea">
                        <button type="button" name="enviar" onclick="validarRegistro()" class="botones-enviar" id="registro">Registrar</button>
                        <button type="reset" class="botones-enviar borrar" id="borrar">Borrar</button>
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
    <!-- MI MODAL -->
    <div class="fondo-modal" id="cerrarModal">
        <div class="modal" id="modal">
            <h2 id="textoModal"></h2>
        </div>
    </div>
    <!-- FIN DE MI MODAL -->
    <footer>

    </footer>
    <script src="/view/static/js/funciones-validar.js"></script>
    <script src="/view/static/js/validaciones.js"></script>
    <script src="/view/static/js/validaciones-registro.js"></script>
    <script>
        let estado = "<?php echo $estado; ?>";
        let mensaje = "<?php echo $mensaje; ?>";

        let modal = document.getElementById("modal");
        let cerrarModal = document.getElementById("cerrarModal");
        let textoModal = document.getElementById("textoModal");

        function insertarTexto(estadoActual, mensajeActual)
        {
            textoModal.innerHTML = mensajeActual;
            estadoActual == "fail" ? textoModal.classList.add("error") : textoModal.classList.add("realizado");
        }

        function abrirModales()
        {
            cerrarModal.classList.add("abrir-modal");
        }

        function cerrarModales()
        {
            cerrarModal.classList.add("cerrar-modal");
        }

        if(estado != "none")
        {
            insertarTexto(estado, mensaje);
            abrirModales();
        }

        cerrarModal.addEventListener("click", cerrarModales);
        
    </script>
</body>
</html>
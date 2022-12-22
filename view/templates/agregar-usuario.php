<?php

include "../../helpers/validacion-administrador.php";
include "../../helpers/validaciones.php";
include "../../models/connection.php";
include "../../models/rol.php";
include "../../daos/rol-dao.php";

$validacion = new Validaciones();
$instancia_rol_dao = new RolDao();

$mensaje = "none";
$estado = "none";

$existen_datos = $validacion->validarEntradas($_GET["estado"], $_GET["mensaje"]);

$roles_disponibles = $instancia_rol_dao->listar_todos_roles_disponibles($_SESSION['rol']);

if($existen_datos) 
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
    <link rel="shortcut icon" href="../static/img/18961875.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/> 
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/estilos-generales.css">
    <link rel="stylesheet" href="../static/css/estilos-login.css">
    <link rel="stylesheet" href="../static/css/estilos-registro.css">
    <link rel="stylesheet" href="../static/css/estilos-agregar.css">
    <title>Nuevo Usuario</title>
</head>
<body>
    
    <?php include 'cabecero.php'; ?>

    <!-- Contenido principal con toda la info -->
    <main class="centrar">
        <!-- Contenedor de informacion general -->
        <div class="contenedor-info">
            <h2 class="top-subtitulo">AGREGAR NUEVO USUARIO</h2>

            <!-- Contendio de abajo con el formulario -->
            <div class="info-bottom">
                <!-- Formulario -->
                <form action="../../controllers/agregar-controller.php" method="POST" class="bottom-formulario">
                    <!-- Contendor de input class="input"s, estilos generales para todos -->
                    <!-- NOMBRE-->
                    <div class="formulario-contenedor">
                        <label for="nombre">Nombre: </label>
                        <input class="input" maxlength="49" autocomplete="off" type="text" name="nombre" id="nombre" placeholder="Mia Sofia" required>
                        <i class="material-symbols-outlined">person_4</i>
                        <p id="mensajeNombre"></p>
                    </div>
                    <!-- APELLIDO -->
                    <div class="formulario-contenedor">
                        <label for="apellido">Apellido: </label>
                        <input class="input" maxlength="49" autocomplete="off" type="apellido" name="apellido" id="apellido" placeholder="Villamizar Zabala" required>
                        <i class="material-symbols-outlined">face</i>
                        <p id="mensajeApellido"></p>
                    </div>
                    <!-- APELLIDO -->
                    <div class="formulario-contenedor">
                        <label for="email">Email: </label>
                        <input class="input" maxlength="99" autocomplete="off" type="text" name="email" id="email" placeholder="Ejemplo@correo.com" required>
                        <i class="material-symbols-outlined">mail</i>
                        <p id="mensajeEmail"></p>
                    </div>
                    <div class="formulario-contenedor">
                        <label for="rol">Rol: </label>
                        <select name="rol" id="rol">
                            <?php foreach($roles_disponibles as $rol): ?>
                                <option value="<?= $rol->getId(); ?>"><?= $rol->getNombre(); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <i class="material-symbols-outlined">bolt</i>
                        <p id="mensajeEmail"></p>
                    </div>
                    <!-- NOMBRE DE USUARIO -->
                    <div class="formulario-contenedor">
                        <label for="username">Nombre de usuario: </label>
                        <input class="input" maxlength="49" autocomplete="off" type="text" name="username" id="username" placeholder="Ejemplo: MiaGamer04" required>
                        <i class="material-symbols-outlined">stadia_controller</i>
                        <p id="mensajeUsername"></p>
                    </div>
                    <!-- CONTRASEÑA -->
                    <div class="formulario-contenedor">
                        <label for="password">Contraseña: </label>
                        <input class="input" maxlength="49" autocomplete="off" type="password" name="password" id="password" placeholder="Micontraseña32?!" required>
                        <i class="material-symbols-outlined">lock</i>
                        <span class="material-symbols-outlined" id="visibilidad">visibility</span>
                        <p id="mensajePassword"></p>
                    </div>
                    <!-- CONTRASEÑA CONFIRMACION -->
                    <div class="formulario-contenedor">
                        <label for="passwordConfirmada">Confirmar Contraseña: </label>
                        <input class="input" maxlength="49" autocomplete="off" type="password" id="passwordConfirmada" placeholder="Micontraseña32?!" required>
                        <i class="material-symbols-outlined">lock</i>
                        <p id="mensajePasswordConfirmada"></p>
                    </div>
                    <div class="formulario-contenedor linea">
                        <button type="button" name="agregar" onclick="validarRegistro()" class="botones-enviar" id="registro">Crear Usuario</button>
                        <button type="reset" class="botones-enviar borrar" id="borrar">Borrar</button>
                    </div>
                    <!-- Fin del contenedor de input class="input"s -->
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
    <script src="../static/js/funciones-validar.js"></script>
    <script src="../static/js/validaciones.js"></script>
    <script src="../static/js/validaciones-registro.js"></script>
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
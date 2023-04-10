<?php

require("../../helpers/validacion-administrador.php");
require("../../helpers/validaciones.php");
$ruta_administrador = "Location: administrar.php";

$validacion = new Validaciones();

if($validacion->validarEntradas($_GET['id'])){
    include("../../models/connection.php");
    include("../../models/usuario.php");
    include("../../models/rol.php");
    include("../../daos/usuario-dao.php");
    include("../../daos/rol-dao.php");
    $id = $_GET['id'];
    
    $instancia_usuario_dao = new UsuarioDao();
    $instancia_rol_dao = new RolDao();
    
    $usuario_seleccionado = $instancia_usuario_dao->listar_usuario_por_id($_GET['id']);
    $roles_disponibles = $instancia_rol_dao->listar_todos_roles_disponibles($_SESSION['rol']);
}else{
    header($ruta_administrador);
}

$mensaje = "none";
$estado = "none";

if (isset($_GET["estado"])) {
    $existen_datos = $validacion->validarEntradas($_GET["estado"], $_GET["mensaje"]);
}

if($existen_datos) 
{
    $estado = $_GET["estado"];
    $mensaje = $_GET["mensaje"];
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
    <link rel="stylesheet" href="/view/static/css/estilos-editar.css">
    <title>Editar</title>
</head>
<body>
    <?php include_once "cabecero.php" ?>
    <div class="contenedor-general-editar">
        <h2>Editando a: <?= "{$usuario_seleccionado->getNombre()} {$usuario_seleccionado->getApellido()}" ?></h2>
        <form action="/controllers/editar-controller.php" method="POST" class="formulario-editar">
            <div class="contenido-principal">
                <div class="formulario-contenido">
                    <div class="contenido-formulario-principal">
                        <label for="id">Id: </label>
                        <div class="contenido-logo-relative">
                            <input class="input" type="text" value="<?= $usuario_seleccionado->getId() ?>" id="id" placeholder="id" disabled required autocomplete="off">
                            <i class="material-symbols-outlined">badge</i>
                        </div>
                    </div>
                    <input class="input" type="text" value="<?= $usuario_seleccionado->getId() ?>" name="id" id="id" placeholder="id" hidden>
                    <div class="contenido-formulario-principal">
                        <label for="nombre">Nombre: </label>
                        <div class="contenido-logo-relative">
                            <input class="input" type="text" value="<?= $usuario_seleccionado->getNombre() ?>" name="nombre" id="nombre" placeholder="Nombre" required autocomplete="off">
                            <i class="material-symbols-outlined">person</i>
                        </div> 
                    </div>
                    <p id="nombreMensaje"></p>
                    <div class="contenido-formulario-principal">
                        <label for="apellido">Apellido: </label>
                        <div class="contenido-logo-relative">
                            <input class="input" type="text" value="<?= $usuario_seleccionado->getApellido() ?>" name="apellido" id="apellido" placeholder="Apellido" required autocomplete="off">
                            <i class="material-symbols-outlined">group</i>
                        </div>
                    </div>
                    <p id="apellidoMensaje"></p>
                </div>
                <div class="formulario-contenido">
                    <div class="contenido-formulario-principal">
                        <label for="email">Email: </label>
                        <div class="contenido-logo-relative">
                            <input class="input" type="text" value="<?= $usuario_seleccionado->getEmail() ?>" name="email" id="email" placeholder="Email" required autocomplete="off">
                            <i class="material-symbols-outlined">contact_mail</i>
                        </div>
                    </div>
                    <p id="emailMensaje"></p>
                    <div class="contenido-formulario-principal">
                        <label for="username">Username: </label>
                        <div class="contenido-logo-relative">
                            <input class="input" type="text" value="<?= $usuario_seleccionado->getUsername() ?>" name="username" id="username" placeholder="Username" required autocomplete="off">
                            <i class="material-symbols-outlined">stadia_controller</i>
                        </div>
                    </div>
                    <p id="usernameMensaje"></p>
                    <div class="contenido-formulario-principal">
                        <label for="rol">Rol: </label>
                        <div class="contenido-logo-relative">
                            <select class="input" name="rol" id="rol" required>
                                <?php foreach($roles_disponibles as $rol): ?>
                                    <option <?php if($rol->getId() == $usuario_seleccionado->getRol()): ?> selected <?php endif; ?> value="<?= $rol->getId(); ?>"><?= $rol->getNombre(); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <i class="material-symbols-outlined">bolt</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contenido-botones">
                <input type="button" id="botonEnviar" onclick="validarActualizacion()" name="editor" class="boton-actualizar" value="Actualizar">
                <input type="reset" onclick="limpiarFormulario()" class="boton-reset" value="Reiniciar">
            </div>
        </form>

        <!-- MI MODAL -->
        <div class="fondo-modal" id="cerrarModal">
            <div class="modal" id="modal">
                <h2 id="textoModal"></h2>
            </div>
        </div>
        <!-- FIN DE MI MODAL -->
    </div>
    <script src="/view/static/js/funciones-validar.js"></script>
    <script src="/view/static/js/validaciones-editar.js"></script>
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
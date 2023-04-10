<?php
session_start();

if($_SESSION["rol"] != "4"){
    require_once($_SERVER['DOCUMENT_ROOT']."/helpers/validacion-administrador.php");
}
require_once($_SERVER['DOCUMENT_ROOT']."/helpers/validaciones.php");

include($_SERVER['DOCUMENT_ROOT']."/models/connection.php");
include($_SERVER['DOCUMENT_ROOT']."/models/usuario.php");
include($_SERVER['DOCUMENT_ROOT']."/daos/usuario-dao.php");

$nuevo_usuario_dao = new UsuarioDao();
$validacion = new Validaciones();

$lista_usuarios = $nuevo_usuario_dao->listar_usuarios_disponibles($_SESSION['rol']);

$mensaje = "none";
$estado = "none";

$existen_datos = $validacion->validarEntradas($_GET["estado"], $_GET["mensaje"]);

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
    
    <link rel="shortcut icon" href="../static/img/18961875.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/estilos-generales.css">
    <link rel="stylesheet" href="../static/css/estilos-administrar.css">
    <title>Administrar</title>
</head>
<body>
    <?php include_once "./cabecero.php"; ?>
    <!-- Contenido principal con toda la info -->
    <main class="centrar">
        <h1 class="bienvenida">BIENVENIDO <span><?= $_SESSION['username'] ?></span></h1>
        <!-- Tabla de usuarios -->
        <?php if(count($lista_usuarios) > 0): ?>
        <h2 class="centrar-texto">Lista de usuarios</h2>
        <table class="tabla-general">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista_usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario->getNombre()?></td>
                        <td><?= $usuario->getUsername()?></td>
                        <td><?= $usuario->getEmail()?></td>
                        <td><?= $usuario->getRol()?></td>
                        <?php if($_SESSION["rol"] == 2 || $_SESSION["rol"] == 3): ?>
                        <td class="botones">
                            <a href="editar.php?id=<?= $usuario->getId(); ?>" class="update"><i class="material-symbols-outlined">settings</i></a>
                            <ahref=($_SERVER['DOCUMENT_ROOT']."/controllers/eliminar-controller.php?id=<?= $usuario->getId() ?>" class="delete"><i class="material-symbols-outlined">delete</i></a)>
                        </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <h2 class="centrar-texto">No hay usuarios disponibles</h2>
        <?php endif; 
        
        if($_SESSION["rol"] != 4): ?>
        <div class="creacion-de-usuario">
            <p>Deseas crear un nuevo usuario?</p>
            <a href="agregar-usuario.php">Crear nuevo usuario</a>
        </div>
        <?php endif;?>
    </main>
    <!-- MI MODAL -->
    <div class="fondo-modal" id="cerrarModal">
        <div class="modal" id="modal">
            <h2 id="textoModal"></h2>
        </div>
    </div>
    <!-- FIN DE MI MODAL -->
    <!-- Fin del contenido principal -->
    <footer>
    </footer>
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
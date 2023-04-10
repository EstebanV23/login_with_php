<?php 

include("../models/connection.php");
include("../models/usuario.php");
require_once("../helpers/validacion-administrador.php");
require_once("../helpers/validaciones.php");
$ruta_login = "Location: /view/templates/login.php";

$validaciones = new Validaciones();

if (isset($_POST)) {
    $validacion_datos = $validaciones->validarEntradas($_POST['nombre'], $_POST['id'], $_POST['apellido'], $_POST['email'], $_POST['username'], $_POST['rol'], $_POST['editor']);
}

ver_errores($_POST);
if (isset($validacion_datos)){
    $nombre = $_POST['nombre'];
    $id = $_POST['id'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $rol = $_POST['rol'];
    $ruta_editar = "Location: /view/templates/editar.php?id=$id";

    if($rol == 3){
        header("$ruta_editar&estado=fail&mensaje=Error, no se pueden crear superusuarios");
    }

    if($rol == 2 && $_SESSION["rol"] != 3){
        header("$ruta_editar&estado=fail&mensaje=Error, no tienes permiso para crear este usuario");
    }

    require_once("../daos/usuario-dao.php");
    
    $instancia_usuario_dao = new UsuarioDao();
    $verificar_usuario = $instancia_usuario_dao->listar_username_user($username);
    $existe_username = false;
    $usuario_extraido = mysqli_fetch_array($verificar_usuario);
    
    if($usuario_extraido['usu_id'] != null){
        $existe_username = $usuario_extraido['usu_id'] != $id;
    }

    if ($existe_username){
        header("$ruta_editar&estado=fail&mensaje=El nombre de usuario ya existe");
    }else{
        $datos_actualizados = $instancia_usuario_dao->actualizar_usuario($nombre, $apellido, $email, $username, $rol, $id);
        if($datos_actualizados){
            header("$ruta_editar&estado=success&mensaje=Los%20datos%20se%20han%20actualizado%20correctamente");
        }else{
            header("$ruta_editar&estado=fail&mensaje=Error inesperado");
        }
    }

}else{
    session_destroy();
    header($ruta_login);
}


function ver_errores($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}

?>
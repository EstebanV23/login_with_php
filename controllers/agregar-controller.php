<?php

require("/helpers/validacion-administrador.php");
require("/helpers/errores.php");
$ruta_agregar = "Location: ../view/templates/administrar.php";

$instancia_errores = new ValidacionErrores();

list($estado, $mensaje) = $instancia_errores->validacion_errores($_POST['agregar'], [[$_POST['nombre'], 50], [$_POST['apellido'], 50], [$_POST['email'], 100], [$_POST['rol'], 1], [$_POST['username'], 50], [$_POST['password'], 50]]);


if($estado != "success"){
    header("$ruta_agregar?estado=$estado&mensaje=$mensaje");
}

include("/daos/usuario-dao.php");
$instancia_usuario_dao = new UsuarioDao();

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$rol = $_POST['rol'];
$username = $_POST['username'];
$password = $_POST['password'];

$nuevo_usuario = new Usuario($nombre, $apellido, $email, $username, $password, null, null, $rol);

$resultado_query = $instancia_usuario_dao->agregar_usuario($nuevo_usuario);

if ($resultado_query!==true) {
    $estado = "fail";
    $mensaje = "Error inesperado";
}

header("$ruta_agregar?estado=$estado&mensaje=$mensaje");


?>
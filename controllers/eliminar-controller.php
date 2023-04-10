<?php

require_once("../helpers/validacion-administrador.php");
require_once("../helpers/validaciones.php");
include("../models/connection.php");
include("../models/usuario.php");
require_once("../daos/usuario-dao.php");

$validaciones = new Validaciones();

$ruta_administrador = "Location: /view/templates/administrar.php";

if($validaciones->validarEntradas($_GET['id'])) {
    $nuevo_usuario_dao = new UsuarioDao();

    $eliminado = $nuevo_usuario_dao->desactivar_usuario($_GET['id']);

    if($eliminado){
        header("$ruta_administrador?estado=success&mensaje=Se ha eliminado correctamente");
    }else{
        header("$ruta_administrador?estado=fail&mensaje=Error inesperado");
    }
}else{
    header("Location: /view/templates/home.php");
}


?>
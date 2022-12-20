<?php

include_once "../helpers/errores.php"; //Incluimos nuestro archivo con la clase de validaciones de errores

$validaciones_errores = new ValidacionErrores(); //Instanciamos nuestra clase de validaciones de errores
$ruta_registro = "../view/templates/registro.php"; //Configuramos la ruta de nuestra vista de registro
// Ejecutamos la funcion de nuestra clase instanciado
list($estado, $mensaje) = $validaciones_errores->validacion_errores('', [[$_POST['nombre'], 50], [$_POST['apellido'], 50], [$_POST['email'], 100], [$_POST['username'], 50], [$_POST['password'], 50]]); //Descomponemos la respuesta que nos arroja esta funcion, que es un array
var_dump($estado, $mensaje);


if($estado === "success"){
    include_once "../daos/usuario-dao.php"; //Incluimos nuestro dao, donde haremos las sentencias SQL
    include_once "../models/usuario.php"; //Incluimos nuesto modelo, para poder enviarselo a nuestro Dao
    $control = new UsuarioDao(); //Instanciamos el dao, este hace la conexion a la base de datos en su constructor, y tiene funciones para implementar sentencias SQL

    // Restacamos las variables del $_POST
    $nombre  = $_POST["nombre"];
    $apellido  = $_POST["apellido"];
    $email  = $_POST["email"];
    $username  = $_POST["username"];
    $password  = $_POST["password"];

    // Verificamos, con nuestra instancia de dao, si ya existe este usuario
    if($control->listar_username_user($username)->num_rows == 0){
        // Creamos un nuevo usuario con los datos que vienen en el POST
        $usuario = new Usuario($nombre, $apellido, $email, $username, $password);
        // Con nuestra clase instanciada de dao, hacemos un insertar, pasandole como parametro un objeto Usuario
        $resultado_query = $control->insertar($usuario);
        // Verificamos la query, si fue correcta o no
        if($resultado_query){
            redireccionar($ruta_registro, $estado, $mensaje);
        }else{
            redireccionar($ruta_registro, "fail", "Error inesperado"); //Esto es excepcion por si occurre algún error al insertar los datos
        }
    }else{
        redireccionar($ruta_registro, "fail", "El usuario ya existe");//Devolvemos a la vista con un mensaje de que el usuario ya existe
    }
}else{
    redireccionar($ruta_registro, $estado, $mensaje);
}

// Función para el redireccionamiento 
function redireccionar(string $ruta, string $estado, string $mensaje) : void{
    header("Location:$ruta?estado=$estado&mensaje=$mensaje");
}


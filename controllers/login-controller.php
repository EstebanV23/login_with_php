<?php 
session_start();
/* traer nuestros helpers para validaciones */
require_once "../helpers/validaciones.php";

$mis_validaciones = new Validaciones();

$ruta_login = "../view/templates/login.php"; //Configuramos la ruta relativa

$entradas_con_datos = $mis_validaciones->validarEntradas($_POST['username'], $_POST['password']); //Guardamos el resultado de la funcion, la cual nos devuelve true o false dependiendo de los datos pasados por parametros

if($entradas_con_datos && isset($_POST['envio'])){

    /* Rescatamos las variables, sabiendo que ya tienen datos y no son vacías */
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once "../daos/usuario-dao.php"; //Traemos nuestro archivo dao que contiene las sentencias SQL

    $control_usuario = new UsuarioDao(); //Al instanciar creamos la conexion a la base de datos

    $resultado_sql = $control_usuario->listar_username_user($username); //Guardamos el resultado de nuestra sentencia SQL

    $datos_user = mysqli_fetch_array($resultado_sql); //Rescatamos un array con el resultado de la sentencia SQL;

    if( $datos_user === null ){
        redireccionar($ruta_login, "El usuario no existe");
    }else{
        if($password === $datos_user['usu_pas']){
            $_SESSION['username'] = $username;
            $_SESSION['rol'] = $datos_user['usu_rol_id'];
            header("Location: ../view/templates/home.php");
        }else{
            redireccionar($ruta_login, "", "Contraseña incorrecta");
        }
    }

}else{
    redireccionar($ruta_login); //redireccionamos la ruta al login sin ningún mensaje
}

function redireccionar(string $ruta, string $mensaje_username = '', string $mensaje_password = '') : void {
    /* Si los datos no vienen vacios redireccionar al login con variables */
    if(!empty($mensaje_username) || !empty($mensaje_password)){
        header("Location: $ruta?mensaje_username=$mensaje_username&mensaje_password=$mensaje_password");
    }else{
        header("Location: $ruta"); //Redirecciona si los datos son vacios
    }

}

?>
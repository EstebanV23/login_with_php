<?php

include "../models/connection.php";
include "../models/usuario.php";

class UsuarioDao extends Connection
{
    public function __construct()
    {
        $this->conectar();
    }
    //Funcion para insertar un nuevo usuario
    public function insertar(Usuario $usuario)
    {
        $sql = mysqli_query($this->connected, "INSERT INTO tbl_usuario(usu_nom, usu_ape, usu_mai, usu_use, usu_pas) VALUES ('{$usuario->getNombre()}','{$usuario->getApellido()}','{$usuario->getEmail()}','{$usuario->getUsername()}','{$usuario->getPassword()}');");
        //Retornamos la query para saber si se hizo correctamente o no
        return $sql;
    }

    //Funcion para traer a todos los Usuarios
    public function listar_all_users() : array
    {
        $sql = mysqli_query($this->connected, "SELECT *  FROM tbl_usuario INNER JOIN tbl_rol ON tbl_usuario.usu_rol_id = tbl_rol.rol_id;");
        //Retornamos la query para saber si retorna filas
        $lista_usuarios = [];
        if($sql->num_rows > 0){
            while ($row = mysqli_fetch_array($sql)) {
                $usuario = new Usuario(); //Creamos un nuevo objeto Usuario
                //En sus metodos set llenamos los valores para crear el objeto
                $usuario->setId($row['usu_id']);
                $usuario->setNombre($row['usu_nom']);
                $usuario->setApellido($row['usu_ape']);
                $usuario->setEmail($row['usu_mai']);
                $usuario->setUsername($row['usu_use']);
                $usuario->setPassword($row['usu_pas']);
                $usuario->setRol($row['rol_nom']);

                //Guardamos el objeto en el array para devolverlo
                array_push($lista_usuarios, $usuario);
            }
        }
        return $lista_usuarios;

    }


    //Funcion para traer a solo un usuario por username
    public function listar_username_user(string $username)
    {
        $username = strtolower($username);

        $sql = mysqli_query($this->connected, "SELECT *  FROM tbl_usuario WHERE usu_use like '$username';");
        //Retornamos la query para saber si retorna filas
        return $sql;
    }
}

?>
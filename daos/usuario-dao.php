<?php

include("../models/connection.php");
include("../models/usuario.php");

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
    public function listar_usuarios_disponibles($rol = 1)
    {
        $query = "SELECT *  FROM tbl_usuario INNER JOIN tbl_rol ON tbl_usuario.usu_rol_id = tbl_rol.rol_id WHERE usu_est = 1 AND usu_rol_id != 3";

        if($rol == 2){
            $query = $query . " AND usu_rol_id != 2";
        }

        $sql = mysqli_query($this->connected, $query);
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
                $usuario->setEstado($row['usu_est']);
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

    public function listar_usuario_por_id($id)
    {
        $query = "SELECT *  FROM tbl_usuario WHERE usu_id = $id";

        $sql = mysqli_query($this->connected, $query);
        //Retornamos la query para saber si retorna filas
        $lista_usuarios = [];
        
        $usuario = new Usuario();
         //Creamos un nuevo objeto Usuario
        if($sql->num_rows > 0){
            $row = mysqli_fetch_array($sql);

            //En sus metodos set llenamos los valores para crear el objeto
            $usuario->setId($row['usu_id']);
            $usuario->setNombre($row['usu_nom']);
            $usuario->setApellido($row['usu_ape']);
            $usuario->setEmail($row['usu_mai']);
            $usuario->setUsername($row['usu_use']);
            $usuario->setPassword($row['usu_pas']);
            $usuario->setEstado($row['usu_est']);
            $usuario->setRol($row['usu_rol_id']);
        }
        return $usuario;

    }
    
    public function desactivar_usuario($id){
        $query = "UPDATE tbl_usuario SET usu_est = 0 WHERE usu_id = $id";
        $sql = mysqli_query($this->connected, $query);
        //Retornamos la query para saber si retorna filas
        return $sql;
    }

    public function actualizar_usuario($nombre, $apellido, $email, $username, $rol, $id){
        try {
            $query = "UPDATE tbl_usuario SET usu_nom = '$nombre', usu_ape = '$apellido', usu_use = '$username', usu_mai = '$email', usu_rol_id = '$rol' WHERE usu_id = $id";
            $sql = mysqli_query($this->connected, $query);
        } catch (\Throwable $e) {
            $sql = $e->getMessage();
        }

        return $sql;
    }

    public function agregar_usuario(Usuario $usuario){
        try {
            $query = "INSERT INTO tbl_usuario(usu_nom, usu_ape, usu_use, usu_pas, usu_mai, usu_rol_id) VALUES('{$usuario->getNombre()}', '{$usuario->getApellido()}', '{$usuario->getUsername()}', '{$usuario->getPassword()}', '{$usuario->getEmail()}', '{$usuario->getRol()}');";
            $sql = mysqli_query($this->connected, $query);
        } catch (\Throwable $e) {
            $sql = $e->getMessage();
        }
        return $sql;
    }
}
?>
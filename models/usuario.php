<?php

class Usuario{
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $email;
    protected $username;
    protected $password;
    protected $estado;
    protected $rol;

    public function __construct(...$args)
    {
        if (isset($args) & !empty($args)) {
            list($nombre, $apellido, $email, $username, $password) = $args;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->email = $email;
            $this->username = $username;
            $this->password = $password;
        }
    }

    public function mostrar_datos()
    {
        return "Nombre: $this->nombre Apellido: $this->apellido Email: $this->email Username: $this->username";
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }
    
}
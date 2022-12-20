<?php

class Connection
{
    protected $host = "localhost:3307"; //Nuestro host donde está alojado la base de datos
    protected $user = "root";//Usuario con el que se entra a la base de datos
    protected $password = "";//La contraseña del usuario
    protected $base_datos = "db_login_prueba";//La base de datos
    protected $connected;//Variable para cuardar la coneccion

    public function conectar() : void
    {
        $this->connected = mysqli_connect($this->host, $this->user, $this->password, $this->base_datos);
    }
}
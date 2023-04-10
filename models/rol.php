<?php

class Rol{
    protected $id;
    protected $nombre;
    protected $descripcion;
    protected $estado;

    public function __construct(...$args){
        if (isset($args) & !empty($args)) {
            list($nombre, $descripcion, $estado, $id) = $args;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->estado = $estado;
            $this->id = $id;
        }
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    
}

?>
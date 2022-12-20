<?php

class Validaciones
{
    public function __construct(){}
    //Funcion para validar las entradas, que estén definidas y que contengan datos
    public function validarEntradas(...$elementos)
    {
        /* Si durante el for, encuentra algún dato vacío o no definido, devuelve un false */
        foreach ($elementos as $elemento) 
        {
            if (!isset($elemento) || empty($elemento)) return false;
        }
        /* Si no encuentra errores en ningún elemento, devuelve true */
        return true;
    }

    /* Funcion para verificar los tamaños de los strings */
    public function validarSize(array ...$elementos)
    {
        foreach ($elementos as list($valor, $size)) 
        {
            if(strlen($valor) > $size) return false;
        }

        return true;
    }
}
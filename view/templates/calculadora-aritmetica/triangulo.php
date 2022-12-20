<?php

include './figuras-geometricas.php';

class Triangulo extends FigurasGeometricas
{
    public $base;
    public $altura;
    public $area;
    public $perimetro;

    function __construct($base, $altura)
    {
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcular_area()
    {
        $this->area = ($this->base * $this->altura)/2;
        return $this->area;
    }
    public function calcular_perimetro()
    {
        $this->perimetro = $this->base * 3;
        return $this->perimetro;
    }

}

?>
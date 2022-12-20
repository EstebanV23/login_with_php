<?php

include './figuras-geometricas.php';

class Circulo extends FigurasGeometricas
{
    public $radio;
    public $area;
    public $perimetro;

    function __construct($radio)
    {
        $this->radio = $radio;
    }

    public function calcular_area()
    {
        $this->area = pi() * 2 * $this->radio;
        return $this->area;
    }
    public function calcular_perimetro()
    {
        $this->perimetro = pi() * ($this->radio ** 2) ;
        return $this->perimetro;
    }

}

?>
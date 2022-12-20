<?php

include './figuras-geometricas.php';

class Cuadrado extends FigurasGeometricas
{
    public $lado_1;
    public $lado_2;
    public $area;
    public $perimetro;

    function __construct($lado_1, $lado_2)
    {
        $this->lado_1 = $lado_1;
        $this->lado_2 = $lado_2;
    }

    public function calcular_area()
    {
        $this->area = $this->lado_1 * $this->lado_2;
        return $this->area;
    }
    public function calcular_perimetro()
    {
        $this->perimetro = ($this->lado_1 * 2) + ($this->lado_2 * 2);
        return $this->perimetro;
    }

}

?>
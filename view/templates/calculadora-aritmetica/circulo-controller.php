<?php

if(isset($_GET['radio']))
{
    include "./circulo.php";

    
    $radio = $_GET['radio'];

    $circulo_instancia = new Circulo($radio);
    
    $area = $circulo_instancia->calcular_area();
    $perimetro = $circulo_instancia->calcular_perimetro();

    header("Location: circulo-view.php?area=$area&perimetro=$perimetro");

} else
    header("Location: circulo-view.php?error=200");


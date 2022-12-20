<?php

if(isset($_GET['base']) && isset($_GET['altura']))
{
    include "./triangulo.php";

    
    $base = $_GET['base'];
    $altura = $_GET['altura'];

    $triangulo_instancia = new Triangulo($base, $altura);
    
    $area = $triangulo_instancia->calcular_area();
    $perimetro = $triangulo_instancia->calcular_perimetro();

    header("Location: triangulo-view.php?area=$area&perimetro=$perimetro");

} else
    header("Location: triangulo-view.php?error=200");


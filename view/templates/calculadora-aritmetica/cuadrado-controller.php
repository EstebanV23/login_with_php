<?php

if(isset($_GET['lado1']) && isset($_GET['lado2']))
{
    include "./cuadrado.php";

    
    $lado_1 = $_GET['lado1'];
    $lado_2 = $_GET['lado2'];

    $cuadrado_instancia = new Cuadrado($lado_1, $lado_2);
    
    $area = $cuadrado_instancia->calcular_area();
    $perimetro = $cuadrado_instancia->calcular_perimetro();

    header("Location: cuadrado-view.php?area=$area&perimetro=$perimetro");

} else
    header("Location: cuadrado-view.php?error=200");


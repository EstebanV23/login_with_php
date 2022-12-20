<?php
    require_once "../../../helpers/verificacion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/estilo-general.css">
    <link rel="stylesheet" href="./css/estilo-cuadrado.css">
    <title>Cuadrado</title>
</head>
<body>
    <?php require "header.php"; ?>
    <header>
        <h1>Cuadrado</h1>
        <hr>
    </header>
    <main>
        <form action="cuadrado-controller.php" method="GET">
            <div class="contenedor-inputs">
                <label for="lado1">Lado 1: </label>
                <input type="number" name="lado1" id="lado1" required min="1">
            </div>
            <div class="contenedor-inputs">
                <label for="lado2">Lado 2: </label>
                <input type="number" name="lado2" id="lado2" required min="1">
            </div>
            <?php
                if(isset($_GET['area']) && isset($_GET['perimetro']))
                {
                    $area = $_GET['area'];
                    $perimetro = $_GET['perimetro'];
                }
            ?>
            <div class="contenedor-inputs">
                <label for="area">Area: </label>
                <input type="text" value="<?php echo $area ?? "No hay resultados" ?>" disabled>
            </div>
            <div class="contenedor-inputs">
                <label for="perimetro">Perimetro: </label>
                <input type="text" value="<?php echo $perimetro ?? "No hay resultados" ?>" disabled>
            </div>
            <div class="contenedor-inputs">
                <input type="submit" class="botones calcular" value="Calcular">
                <input type="reset" class="botones limpiar" value="Limpiar">
            </div>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>
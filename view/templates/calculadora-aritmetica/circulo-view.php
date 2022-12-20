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
    <title>Circulo</title>
</head>
<body>
    <?php require "header.php"; ?>
    <header>
        <h1>Circulo</h1>
        <hr>
    </header>
    <main>
        <form action="circulo-controller.php" method="GET">
            <div class="contenedor-inputs">
                <label for="radio">Radio: </label>
                <input type="number" name="radio" id="radio" required min="1">
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- incluir validacion.php -->
    <?php
    include "validacion.php";
    ?>
    <!-- crear formulario con titulo capitulos y fecha_estreno -->
    <form action="formulario.php" method="post">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="titulo">
            <?php
            if (isset($error)) {
                echo "<p>$error</p>";
            }
            ?>
        <br>

        <label for="capitulos">Capitulos</label>
        <input type="number" name="capitulos" id="capitulos">
        <br>

        <label for="fecha_estreno">Fecha de estreno</label>
        <input type="date" name="fecha_estreno" id="fecha_estreno">
        <br>

        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>
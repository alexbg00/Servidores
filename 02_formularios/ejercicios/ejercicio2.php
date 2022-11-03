<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Ejercicio 2</h1>

    <p>Crear un formulario que reciba un número. 
    Generar una lista dinámicamente con tantos elementos
    como se haya indicado</p>

    <div>
        <form action="ejercicio2_respuesta.php" method="get">
            <label>Número</label><br>
            <input type="text" name="numero"><br><br>
            <input type="submit" value="Enviar">
        </form>
    </div>
    <?php 
        require 'footer.php';
    ?>
</body>
</html>


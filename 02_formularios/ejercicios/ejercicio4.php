<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ejercicio4_respuesta.php" method="get">
        <label>Frase</label><br>
        <input type="text" name="frase"><br><br>
        <label>Encabezado</label><br>
        <input type="text" name="encabezado"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php 
        require 'footer.php';
    ?>
</body>
</html>
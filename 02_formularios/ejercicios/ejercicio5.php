<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ejercicio5_respuesta.php" method="get">
        <label>Base</label><br>
        <input type="text" name="base"><br><br>
        <label>Exponente</label><br>
        <input type="text" name="exponente"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php 
        require 'footer.php';
    ?>
</body>
</html>
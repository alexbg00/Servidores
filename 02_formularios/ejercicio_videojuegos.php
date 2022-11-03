<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"></meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
    <title>Document</title>
</head>
<body>
    <h1>Videojuegos</h1>
    <form action="ejercicio_videojuegos.php" method="post">
        <label>Nombre:</label><br>
        <input type="text" name="nombre"><br><br>
        <label>Consola</label><br>
        <select name="consola">
            <option value="ps4">PS4</option>
            <option value="ps5">PS5</option>
            <option value="switch">Switch</option>
        </select><br><br>
        <label>¿Edición especial?</label><br>
        <input type="checkbox" name="especial" value="si"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $consola = $_POST["consola"];
            $especial = "";
            if (isset($_POST["especial"])) {
                $especial = $_POST["especial"];
            }
            
            $precio = 0;

            //  Comprobamos la consola
            if ($consola == "ps4") {
                $precio = 60;
            } else if ($consola == "ps5") {
                $precio = 70;
            } else if ($consola == "switch") {
                $precio = 40;
            }

            //  Comprobamos si es edición especial
            if ($especial == "si") {
                $precio *= 1.25;
            }

            echo "<h3>El videojuego $nombre vale $precio</h3>";
        }
    ?>
</body>
</html>
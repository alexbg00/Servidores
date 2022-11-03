<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $temp_nombre = depurar($_POST["nombre"]);
            $temp_apellidos = depurar($_POST["apellidos"]);

            if (empty($temp_nombre)) {
                $err_nombre = "El nombre es obligatorio";
            } else {
                $pattern = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/";

                if (!preg_match($pattern, $temp_nombre)) {
                    $err_nombre = "El nombre solo puede contener letras";
                } else {
                    $nombre = $temp_nombre;
                    echo "<p>$nombre</p>";
                }
            }
        }

        function depurar($dato) {
            $dato = trim($dato);
            $dato = stripslashes($dato);
            $dato = htmlspecialchars($dato);
            return $dato;
        }
    ?>

    <form action="" method="post">
        <p>Nombre: 
            <input type="text" name="nombre">
            <span class="error">
                * <?php if(isset($err_nombre)) echo $err_nombre ?>
            </span>
        </p>
        <p>Apellidos: 
            <input type="text" name="apellidos">
        </p>
        <p>DNI: 
            <input type="text" name="dni">
        </p>
        <p>
            <input type="submit" value="Enviar">
        </p>
    </form>
</body>
</html>
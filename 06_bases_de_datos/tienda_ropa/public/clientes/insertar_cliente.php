<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Insertar Cliente</title>
</head>

<body>
    <?php require "../../util/base_de_datos.php" ?>

    <?php require "../sesion/control_de_acceso.php" ?>

    <?php
    $correcto = "";
    $error = "";
    /* insertar imagen de avatar sino insertar un avatar por defecto*/

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $nombre = $_POST["nombre"];
        $primer_apellido = $_POST["apellido1"];
        $segundo_apellido = $_POST["apellido2"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];

        
        $file_name = $_FILES["imagen"]["name"];
        $file_temp_name = $_FILES["imagen"]["tmp_name"];
        $path = "../../resources/images/clientes/" . $file_name;
        
        echo "<p>$file_name</p>";


        if (
            !empty($usuario) && !empty($nombre) &&
            !empty($primer_apellido &&
            !empty($fecha_nacimiento) && !empty($file_name))
        ) {
            //insertar en la carpeta clientes la imagen
            if (move_uploaded_file($file_temp_name, $path)) {
                echo "<p>Fichero movido con éxito</p>";
            } else {
                echo "<p>No se ha podido mover el fichero</p>";
            }
                ////////////////////////////
            $segundo_apellido =
                !empty($segundo_apellido) ? "'$segundo_apellido'" : "NULL";

            $avatar = "/resources/images/clientes/" . $file_name;

            $sql = "INSERT INTO cliente (usuario, nombre,apellido_1, apellido_2,fecha_nacimiento,imagen) 
            VALUES ('$usuario', '$nombre','$primer_apellido', $segundo_apellido,'$fecha_nacimiento','$avatar')";

            if ($conexion->query($sql) == "TRUE") {
    ?>
                <div class='alert alert-success alert-dismissible fade show'>
                    <strong>Correcto! <?php echo $file_name ?></strong> <?php echo $correcto ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            } else {
            ?>
                <div class='alert alert-danger alert-dismissible fade show'>
                    <strong>Error!</strong> <?php echo $error ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    <?php
            }
        }else {
            /* meter una imagen por defecto si el campo imagen esta vacio */
            $avatar = "/resources/images/clientes/552721.png";

            $segundo_apellido =
                !empty($segundo_apellido) ? "'$segundo_apellido'" : "NULL";

            $sql = "INSERT INTO cliente (usuario, nombre,apellido_1, apellido_2,fecha_nacimiento,imagen) 
            VALUES ('$usuario', '$nombre','$primer_apellido', $segundo_apellido,'$fecha_nacimiento','$avatar')";

            if ($conexion->query($sql) == "TRUE") {
    ?>
                <div class='alert alert-success alert-dismissible fade show'>
                    <strong>Correcto! <?php echo $file_name ?></strong> <?php echo $correcto ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            } else {
            ?>
                <div class='alert alert-danger alert-dismissible fade show'>
                    <strong>Error!</strong> <?php echo $error ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    <?php

            }
        }
    }


    ?>
    <div class="container">
        <?php require '../header.php' ?>

        <h1>Crear Cliente</h1>
        <a href="index.php" class="btn btn-primary" style="margin:30px">Listado clientes</a>
        <form action="insertar_cliente.php" method="POST" class="form-control mt-1" enctype="multipart/form-data">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control"><br>
            <label for="apellido1">Primer Apellido</label>
            <input type="text" name="apellido1" id="apellidos1" class="form-control"><br>
            <label for="apellido2">Segundo Apellido</label>
            <input type="text" name="apellido2" id="apellidos2" class="form-control"><br>
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"><br>
            <label for="imagen">Avatar</label>
            <input type="file" name="imagen" id="imagen" class="form-control"><br>
            <input class="btn btn-primary" type="submit" value="Insertar">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>
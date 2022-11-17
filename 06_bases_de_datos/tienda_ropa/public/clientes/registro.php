<!doctype html>
<html lang="en">

<head>
    <title>Registro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <?php require "../../util/base_de_datos.php" ?>

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
            $contrasena = $_POST["contrasena"];

            $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);


            $file_name = $_FILES["imagen"]["name"];
            $file_temp_name = $_FILES["imagen"]["tmp_name"];
            $path = "../../resources/images/clientes/" . $file_name;

            echo "<p>$file_name</p>";


            if (
                !empty($usuario) && !empty($nombre) &&
                !empty($primer_apellido &&
                    !empty($fecha_nacimiento) && !empty($file_name) && !empty($hash_contrasena))
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

                $sql = "INSERT INTO cliente (usuario, nombre,apellido_1, apellido_2,fecha_nacimiento,imagen,contrasena) 
        VALUES ('$usuario', '$nombre','$primer_apellido', $segundo_apellido,'$fecha_nacimiento','$avatar','$hash_contrasena')";

                if ($conexion->query($sql) == "TRUE") {
        ?>
                    <div class='alert alert-success alert-dismissible fade show'>
                        <strong>Correcto! <?php echo $file_name ?></strong><?php echo $correcto ?>
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
            } else {
                /* meter una imagen por defecto si el campo imagen esta vacio */
                $avatar = "/resources/images/clientes/552721.jpg";

                $segundo_apellido =
                    !empty($segundo_apellido) ? "'$segundo_apellido'" : "NULL";

                $sql = "INSERT INTO cliente (usuario, nombre,apellido_1, apellido_2,fecha_nacimiento,imagen,contrasena) 
        VALUES ('$usuario', '$nombre','$primer_apellido', $segundo_apellido,'$fecha_nacimiento','$avatar','$hash_contrasena')";

                if ($conexion->query($sql) == "TRUE") {
                ?>
                    <div class='alert alert-success alert-dismissible fade show'>
                        <strong>Correcto! <?php echo $file_name ?></strong>, se ha introducido un avatar por defecto  <?php echo $correcto ?>
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

        <h1>Registrate!</h1>
        <a href="index.php" class="btn btn-primary disabled" style="margin:30px" >Listado clientes</a>
        <form action="registro.php" method="POST" class="form-control mt-1" enctype="multipart/form-data">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control">
            <label for="usuario">Contraseña</label>
            <input type="password" name="contrasena" class="form-control">
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

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
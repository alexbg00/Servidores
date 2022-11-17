<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <?php require "./util/base_de_datos.php" ?>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $usuario = $_POST["usuario"];
            $contrasena = $_POST["contrasena"];
            $nombre = $_POST["nombre"];

            //encriptar la contraseña
            $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);


            echo $usuario . " " . $contrasena . " " . $nombre . " " . $hash_contrasena . "<br>";

            $sql = "INSERT INTO usuarios (usuario, contrasena, nombre) VALUES ('$usuario', '$hash_contrasena', '$nombre')";

            if($conexion->query($sql) === TRUE){
                header("Location: login.php");
            }else{
                echo "Error al registrar usuario";
            }
        }
        ?>


    <div class="container">
        <h1>Registrarse</h1>
        <div class="row">
            <div class="col-6">
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label class="form-label" >Usuario</label>
                        <input type="text" class="form-control" name="usuario" type="text" placeholder="Usuario">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" >Contraseña</label>
                        <input class="form-control" name="contrasena" type="password" placeholder="Contraseña">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" name="nombre" type="text" placeholder="Nombre">
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary" type="submit">Registrarse</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
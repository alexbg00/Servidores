<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <?php require '../../util/base_de_datos.php' ?>
        <?php require '../header.php' ?>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET["id"];
            
            $sql = "SELECT * FROM cliente WHERE id = '$id'";
            
            $resultado = $conexion -> query($sql);
            
            if ($resultado -> num_rows > 0) {
                while ($fila = $resultado -> fetch_assoc()) {
                    $usuario = $fila["usuario"];
                    $nombre = $fila["nombre"];
                    $apellido1 = $fila["apellido_1"];
                    $apellido2 = $fila["apellido_2"];
                    $fecha_nacimiento = $fila["fecha_nacimiento"];
                    $imagen = $fila["imagen"];
                }
            }
        }
        ?>

        <h1>Ver perfil de <?php echo $usuario?></h1>
        <div class="row">
            <div class="col-4">
                <p>Usuario: <?php echo $usuario ?></p>
                <p>Nombre: <?php echo $nombre ?></p>
                <p>Apellidos: <?php echo $apellido1 . $apellido1?> </p>
                <p>Fecha de nacimiento: <?php echo $fecha_nacimiento ?></p>
                <a class="btn btn-secondary" href="index.php" >Volver</a>
                <form action="editar_prenda.php" method="get">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="usuario" value="<?php echo $usuario ?>">
                    <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
                    <input type="hidden" name="apellido1" value="<?php echo $apellido1 ?>">
                    <input type="hidden" name="apellido2" value="<?php echo $apellido2 ?>">
                    <input type="hidden" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento ?>">
                    <button type="submit" class="btn btn-primary mt-3">Editar</button>
                </form>
            </div>
            <div class="col-4">
                <img witdh="200" height="300" src="../..<?php echo $imagen ?>">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
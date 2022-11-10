<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Ver prenda</title>
</head>
<body>
    <?php require "../../util/base_de_datos.php" ?>
    <?php require "../header.php" ?>
    <div class="container">
    <h1>Ver prenda</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];
        //echo "<p>$id</p>";
    }

    $sql = "SELECT * FROM prendas WHERE id = $id";

    $resultado = $conexion -> query($sql);
    if($resultado -> num_rows>0){
        while($fila = $resultado -> fetch_assoc()){
        $nombre = $fila["nombre"];
        $talla = $fila["talla"];
        $precio = $fila["precio"];
        $categoria = $fila["categoria"];
        $imagen = $fila["imagen"];
        }
    }
    ?>
    <div class="container">
        <div class ="row">
            <div class="col-3">
                <h2 style="color:blue"><?php echo $nombre ?></h2>
                <h4>Talla:</h4><p style="font-size:20px"><?php echo $talla ?></p>
                <h4>Precio:</h4><p style="font-size:20px"><?php echo $precio ?>€</p>
                <h4>Categoria:</h4><p style="font-size:20px"><?php echo $categoria ?></p>
            </div>
    
            <div class="col-4">
                <img width="auto" height="340" src="../../<?php echo $imagen ?>" alt="" >
            </div>
        </div>
        </div>
        <a href="index.php" class="btn btn-primary">Volver</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
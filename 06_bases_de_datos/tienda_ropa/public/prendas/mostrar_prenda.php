<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        echo "<p>$id</p>";
    }

    $sql = "SELECT * FROM prendas WHERE id = $id";

    $resultado = $conexion -> query($sql);
    if($resultado -> num_rows>0){
        while($fila = $resultado -> fetch_assoc()){
        $nombre = $fila["nombre"];
        $talla = $fila["talla"];
        $precio = $fila["precio"];
        $categoria = $fila["categoria"];
    }
}
    echo "<p>$nombre</p> . <p>$talla</p> . <p>$precio</p> . <p>$categoria</p>"; 
    ?>

    </div>
</body>
</html>
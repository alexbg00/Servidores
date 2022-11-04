<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Nueva Prenda</title>
</head>

<body>
    <?php
    require '../../util/base_de_datos.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $talla = $_POST["talla"];
        $precio = $_POST["precio"];
        $categoria = $_POST["categoria"];

        $error = " ";
        $correcta = " ";
        if (!empty($nombre) && !empty($talla) && !empty($precio) && !empty($categoria)) {
            $sql = "INSERT INTO prendas (nombre, talla, precio, categoria) VALUES ('$nombre', '$talla', '$precio' , '$categoria')";


            if ($conexion->query($sql) == "TRUE") {
                $correcta = "PRENDA DE ROPA INSERTADA CORRECTAMENTE";
            } else {
                $error = "NO SE HA PODIDO INSERTAR LA PRENDA";
            }
        } else {
            $error = "NO SE HA PODIDO INSERTAR LA PRENDA";
        }
    }
    ?>
    <div class="container">
        <h1>Nueva Prenda</h1>

        <div class="row">
            <div class="col-6">
                <form method="POST">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" type="text" name="nombre">
                    <br>
                    <label class="form-label">Talla</label>
                    <select name="talla" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>Seleccione su talla</option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                    <br>
                    <label class="form-label
                    <label class="form-label">Categoria</label>
                    <select name ="categoria" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>Seleccione su categoria</option>
                        <option value="Pantalones">Pantalones</option>
                        <option value="Camisetas">Camiseta</option>
                        <option value="Accesorios">Accesorio</option>
                    </select>
                    <br>

                    <label class="form-label">Precio</label>
                    <input class="form-control" type="text" name="precio">
                    <br>
                    <!-- boton visible si completas todo el formulario -->


                    <button class="btn btn-primary" type="submit">Crear</button>
                    <a class="btn btn-secondary" href="index.php">listado de ropa</a>
                </form>
                <h3 style="color:lightgreen"><?php
                if (!empty($correcta)) {
                    echo $correcta;
                } ?>
                </h3>

                <h3 style="color:red"><?php if (!empty($error)) {
                    echo $error;
                } ?>
                </h3>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
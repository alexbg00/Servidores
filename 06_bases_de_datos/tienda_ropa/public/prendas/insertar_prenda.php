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
    <?php require "../sesion/control_de_acceso.php" ?>
    <?php require '../../util/base_de_datos.php'; ?>



    <?php
    function depurar($dato)
    {
        $dato = trim($dato);
        $dato = stripslashes($dato);
        $dato = htmlspecialchars($dato);
        return $dato;
    }
    ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = depurar($_POST["nombre"]);
        $precio = depurar($_POST["precio"]);
        if (isset($_POST["categoria"])) {
            $categoria = $_POST["categoria"];
        } else {
            $categoria = "";
        }
        //la talla tiene que mayor a 0 
        if (isset($_POST["talla"]) && $_POST["talla"] > 0) {
            (int)$talla   = depurar($_POST["talla"]);
            
        } else {
            $talla = "";
        }
        $file_name = $_FILES["imagen"]["name"];
        $file_temp_name = $_FILES["imagen"]["tmp_name"];
        $path = "../../resources/images/prendas/" . $file_name;


        if (empty($_POST["nombre"] )) {
            $err_nombre = "Introduzca el nombre";
        //el tamaño tiene que ser menor a 20 caracteres
        } if (strlen($_POST["nombre"]) > 20) {
            $err_nombre = "El nombre no puede tener más de 20 caracteres";
        } else {
            $nombre = depurar($_POST["nombre"]);
        }
        if (empty($_POST["talla"]) ) {
            $err_talla = "Introduzca la talla";
        }else{
            $talla = $_POST["talla"];
        }
        if (empty($_POST["precio"])) {
            $err_precio = "Introduzca el precio" ;
        }
        if($precio <0){
            $err_precio = "El precio no puede ser negativo";
        }else {
            $precio = depurar($_POST["precio"]);
        }
        if (empty($file_name)) {
            $err_imagen = "Introduzca una imagen";
        } else {
            
        $file_name = $_FILES["imagen"]["name"];
        $file_temp_name = $_FILES["imagen"]["tmp_name"];
        $path = "../../resources/images/prendas/" . $file_name;
        }


        if (!empty($nombre) && !empty($talla) && !empty($precio) && !empty($file_name)) {
            //  Subimos la imagen a la carpeta deseada
            if (move_uploaded_file($file_temp_name, $path)) {
                /*                     echo "<p>Fichero movido con éxito</p>";
 */
            } else {
                echo "<p>No se ha podido mover el fichero</p>";
            }

            //  Insertamos la prenda en la base de datos
            $imagen = "/resources/images/prendas/" . $file_name;
            //no insertar la prenda si se repite la img
            $sql = "SELECT * FROM prendas WHERE imagen = '$imagen'";
            $resultado = $conexion->query($sql);
            if ($resultado->num_rows > 0) {
                echo "<p>La prenda ya existe</p>";
            } else if (!empty($categoria)) {
                $sql = "INSERT INTO prendas (nombre, talla, precio, categoria, imagen)
                        VALUES ('$nombre', '$talla', '$precio', '$categoria', '$imagen')";
            } else {
                $sql = "INSERT INTO prendas (nombre, talla, precio, imagen)
                        VALUES ('$nombre', '$talla', '$precio', '$imagen')";
            }


            if ($conexion->query($sql) == "TRUE") {
    ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Se ha insertado la prenda
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Error al insertar
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    <?php
            }
        }
    }
    ?>

    <div class="container">
        <?php require '../header.php' ?>
        <br>
        <h1>Nueva Prenda</h1>
        <a href="index.php" class="btn btn-primary">Ver Listado</a>

        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label class="form-label">Nombre</label>
                        <span class="text-danger">  *Obligatorio <?php if(!empty($err_nombre))echo $err_nombre; ?></span>
                        <input class="form-control" type="text" name="nombre">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Talla</label>
                        <span class="text-danger">  *Obligatorio <?php if(!empty($err_talla))echo $err_talla; ?></span>

                        <select class="form-select" name="talla">
                            <option value="" selected disabled hidden>-- Selecciona la talla --</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>

                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Precio</label>                        
                        <span class="text-danger">  *Obligatorio <?php if(!empty($err_precio))echo $err_precio; ?></span>
                        <input class="form-control" name="precio" type="number" >

                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Categoría</label>
                        <select class="form-select" name="categoria">
                            <option value="" selected disabled hidden>-- Selecciona la categoría --</option>
                            <option value="CAMISETAS">Camisetas</option>
                            <option value="PANTALONES">Pantalones</option>
                            <option value="ACCESORIOS">Accesorios</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Imagen</label>
                        <input class="form-control" type="file" name="imagen">
                        <span class="text-danger">  *Obligatorio <?php if(!empty($err_imagen))echo $err_imagen; ?></span>

                    </div>
                    <button class="btn btn-primary" type="submit">Crear</button>
                    <a class="btn btn-secondary" href="index.php">Volver</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
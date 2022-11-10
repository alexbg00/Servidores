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
    $error = "";
    $correcta = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $talla = $_POST["talla"];
        $precio = $_POST["precio"];
        if(isset($_POST["categoria"])){
            $categoria = $_POST["categoria"];
        }else{
            $categoria = "";
        }
        //localizamos el campo imagen del formulario por su nombre "imagen" y obtenemos el nombre del archivo (imagen.jpg)
        $file_name = $_FILES["imagen"]["name"];
        //donde se almacena temporalmente
        $file_temp_name = $_FILES["imagen"]["tmp_name"];
        $path = "../../resources/images/prendas/" . $file_name;

        



        
        if (!empty($nombre) && !empty($talla) && !empty($precio)) {
            //Subimos la imagen a la carpeta deseada
            if(move_uploaded_file($file_temp_name, $path)){
                echo "<p>Fichero movido con exito</p>";
            }else{
                echo "<p>No se ha podido mover el fichero</p>";
            }
            //Insertamos la prenda en la bbdd completa o sin categoria
            $imagen = "/resources/images/prendas/" . $file_name;
            if(!empty($categoria)){
                $sql = "INSERT INTO prendas (nombre, talla, precio, categoria, imagen) VALUES ('$nombre', '$talla', '$precio' , '$categoria','$imagen')";
            }else{
                $sql = "INSERT INTO prendas (nombre, talla, precio, imagen) VALUES ('$nombre', '$talla', '$precio', '$imagen')";
            }

            //comprobar que se ha insertado todo correctamente
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
    <?php require '../header.php'?>
        <h1>Nueva Prenda</h1>
        <a class ="btn btn-primary" href="index.php" style="margin:30px">Ver listado</a>

        <div class="row">
            <div class="col-6">                
                <?php if ($error != "") { ?>
                    
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $error?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <?php if ($correcta != "") { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $correcta ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    </div>
                <?php } ?>
                <form method="POST" enctype="multipart/form-data">
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
                    <label class="form-label">Categoria</label>
                    <select name ="categoria" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option value="" selected disabled hidden>Seleccione su categoria</option>
                        <option value="Pantalones">Pantalones</option>
                        <option value="Camisetas">Camiseta</option>
                        <option value="Accesorios">Accesorio</option>
                    </select>
                    <br>
                    <label class="form-label">Precio</label>
                    <input class="form-control" type="text" name="precio">
                    <br>
                    <label class="form-label">Imagen</label>
                    <input class="form-control" type="file" name="imagen">
                    <br>

                    <button class="btn btn-primary" type="submit">Crear</button>

                </form>
                
                <?php
                if (!empty($correcta)) {
                    $correcta ="Prenda insertada correctamente";


                } else {
                    $error = "No se ha podido insertar la prenda";
                } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Videojuegos</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>Nuevo videojuego</h2>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $temp_titulo = depurar($_POST["titulo"]);
                    $temp_precio = depurar($_POST["precio"]);
                    if (isset($_POST["consola"])) {
                        $temp_consola = depurar($_POST["consola"]);
                    } else {
                        $temp_consola = "";
                    }
                    $temp_descripcion = $_POST["descripcion"];

                    //  Validación de la descripción
                    if (empty($temp_descripcion)) {
                        $err_descripcion = "La descripción es obligatoria";
                    } else {
                        if (strlen($temp_descripcion) > 255) {
                            $err_descripcion = "La descripción no puede tener más de 255 caracteres";
                        } else {
                            $descripcion = $temp_descripcion;
                        }
                    }

                    if (empty($temp_consola)) {
                        $err_consola = "La consola es obligatoria";
                    } else {
                        $consola = $temp_consola;
                    }

                    if (empty($temp_titulo)) {
                        $err_titulo = "El título es obligatorio";
                    } else {
                        if (strlen($temp_titulo) > 40) {
                            $err_titulo = "El título no puede tener más de 40 caracteres";
                        } else {
                            //  ¡ÉXITO!
                            $titulo = $temp_titulo;
                        }
                    }

                    if (empty($temp_precio)) {
                        $err_precio = "El precio es obligatorio";
                    } else {
                        $temp_precio = filter_var($temp_precio, FILTER_VALIDATE_FLOAT);

                        if (!$temp_precio) {
                            $err_precio = "El precio debe ser un número";
                        } else {
                            $temp_precio = round($temp_precio, 2);
                            if ($temp_precio < 0) {
                                $err_precio = "El precio no puede ser negativo";
                            } else if ($temp_precio >= 10000) {
                                $err_precio = "El precio no puede ser igual o superior a 10000";
                            } else {
                                //  ¡ÉXITO!
                                $precio = $temp_precio;
                            }
                        }
                    }

                    if (isset($titulo) && isset($precio) && isset($consola) && isset($descripcion)) {
                        echo "<p>$titulo</p>";
                        echo "<p>$precio</p>";
                        echo "<p>$consola</p>";
                        echo "<p>$descripcion</p>";
                    }
                }

                function depurar($dato)
                {
                    $dato = trim($dato);
                    $dato = stripslashes($dato);
                    $dato = htmlspecialchars($dato);
                    return $dato;
                }
                ?>
                <form action="" method="post">
                    <div>
                    <label class="form-label">Título:</label>
                    <input class="form-control" type="text" name="titulo">
                        <span class="error">
                            * <?php if (isset($err_titulo)) echo $err_titulo ?>
                        </span>
                    </div>
                    <label class="form-label">Precio:</label>
                        <input class="form-control" type="text" name="precio">
                        <span class="error">
                            * <?php if (isset($err_precio)) echo $err_precio ?>
                        </span>

                    <p>Consola:
                        <select name="consola" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option value="" selected disabled hidden>Elige una consola</option>
                            <option value="ps4">Playstation 4</option>
                            <option value="ps5">Playstation 5</option>
                            <option value="switch">Nintendo Switch</option>
                        </select>
                        <span class="error">
                            * <?php if (isset($err_consola)) echo $err_consola ?>
                        </span>
                    </p>
                    <label class="form-label">Descripción: </label>
                        <textarea class="form-control" name="descripcion"></textarea>
                        <span class="error">
                            * <?php if (isset($err_descripcion)) echo $err_descripcion ?>
                        </span>
                    
                    <p><input class="btn btn-success btn-lg" type="submit" value="Crear"></p>
                </form>
            </div>
        </div>
    </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
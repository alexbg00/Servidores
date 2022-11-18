<!doctype html>
<html lang="en">

<head>
    <title>Comprar prenda</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <?php require "../sesion/control_de_acceso.php" ?>
    <?php require "../header.php"; ?>
    <?php require "../../util/base_de_datos.php"; ?>


    <div class="container">
        <h1>Comprar prenda</h1>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prenda_id = $_POST['prenda'];
            $cantidad = $_POST['cantidad'];
            //$cliente_id = 88;
            $fecha = date("Y-m-d H:i:s");
            
            //obtener el cliente_id del usuario que ha iniciado sesión
            $usuario = $_SESSION["usuario"];

            $sql = "SELECT * FROM cliente WHERE usuario = '$usuario'";
            $resultado = $conexion->query($sql);

            if($resultado->num_rows > 0){
                while($fila = $resultado->fetch_assoc()){
                    $cliente_id = $fila["id"];
                }
            }
            ////////////////////////////////////////////
            

            echo "ID prenda: $prenda_id <br>";
            echo "Cantidad: $cantidad <br>";

            //insertar en la tabla cliente_prenda
                $sql = "INSERT INTO clientes_prendas (cliente_id, prenda_id, cantidad,fecha) 
                                                VALUES ('$cliente_id', '$prenda_id', '$cantidad','$fecha')";

                if ($conexion -> query($sql) == "TRUE") {
        ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Prenda comprada!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
        <?php
                } else {
                    echo "Error al comprar prenda";
                }
            
        }
        ?>

        <div class="row">
            <div class="col-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Imagen</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM prendas";
                        $resultado = $conexion->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) {
                        ?>
                                <form action="" method="POST">
                                    <tr>
                                        <td><?php echo $fila["nombre"] ?></td>
                                        <td><img src="../../<?php echo $fila["imagen"] ?>" width="100px"></td>
                                        <td><?php echo $fila["precio"] ?>€</td>
                                        <td>
                                            <select class="form-select" name="cantidad">
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-success">Comprar</button>
                                            <input type="hidden" name="prenda" value="<?php echo $fila["id"] ?>">
                                        </td>
                                    </tr>
                                </form>

                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
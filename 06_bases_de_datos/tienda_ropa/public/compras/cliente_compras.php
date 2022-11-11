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
    <?php require '../header.php' ?>
    <?php require '../../util/base_de_datos.php' ?>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $usuario = $_GET['usuario'];
    }
    ?>
    <div class="container">
    <h1>Compras de <?php echo $usuario ?></h1>
    <div class="row">
        <div class="col-9">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unidad</th>
                        <th>Precio Total</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM vw_clientes_prendas WHERE usuario = '$usuario'";
                    $resultado = $conexion->query($sql);
                    $precio_total = 0;

                    if ($resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_assoc()) {
                            $producto = $fila['producto'];
                            $cantidad = $fila['cantidad'];
                            $precio = $fila['precio'];
                            $fecha = $fila['fecha'];
                            $precio_total += $precio * $cantidad;
                            //TODO DAR FORMATO
                            ?>
                            <tr>
                                <td><?php echo $producto ?></td>
                                <td><?php echo $cantidad ?></td>
                                <td><?php echo $precio ?></td>
                                <td><?php echo $precio * $cantidad ?></td>
                                <td><?php echo $fecha ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
            <h2><span class="badge text-bg-success">Total: <?php echo $precio_total?>€</span></h2>

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
<!doctype html>
<html lang="en">

<head>
    <title>Compras</title>
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
            session_start();
            if(!isset($_SESSION["usuario"])){
                header("location:clientes/login.php");
            }else{
                echo "<p>Has iniciado con: " . $_SESSION["usuario"] . "</p>";
            }
            ?>


    <div class="container">
        <h1>Listado de compras</h1>

        <div class="row">
            <div class="col-9">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Usuario</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM vw_clientes_prendas";
                        $resultado = $conexion->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) {
                                $usuario = $fila['usuario'];
                                $producto = $fila['producto'];
                                $cantidad = $fila['cantidad'];
                                $precio = $fila['precio'];
                                $fecha = $fila['fecha'];
                                //TODO DAR FORMATO
                                ?>
                                <tr>
                                    <td><a href="./cliente_compras.php?usuario=<?php echo $usuario ?>"><?php echo $usuario ?></a></td>
                                    <td><?php echo $producto ?></td>
                                    <td><?php echo $cantidad ?></td>
                                    <td><?php echo $precio ?></td>
                                    <td><?php echo $fecha ?></td>
                                </tr>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Listado de prendas</title>
</head>

<body>
    <!-- acceder a base_de_datos.php -->

    <?php require "../../util/base_de_datos.php" ?>
    <div class="container">
        <?php require '../header.php' ?>
        <h1>Listado de prendas</h1>
        <!-- boton que redireccione a insertar_prenda.php -->
        <a class="btn btn-primary" href="insertar_prenda.php" style="margin:30px">Insertar Prenda</a>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped  table-hover">
                    <thead>
                        <tr class="table-dark">
                            <th>Nombre</th>
                            <th>Talla</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT * FROM prendas";
                        $resultado = $conexion->query($sql);
                        ?>
                        <!-- BORRAR PRENDA -->
                    
                        <?php
                        /* eliminar prenda */
                    
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $id = $_POST["id"];
                            $sql = "DELETE FROM prendas WHERE id = $id";
                            $conexion->query($sql);
                            
                        }
                    
                        ?>

                        <?php
                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $fila["nombre"] ?></td>
                                    <td><?php echo $fila["talla"] ?></td>
                                    <td><?php echo $fila["precio"] ?></td>
                                    <td><?php echo $fila["categoria"] ?></td>
                                    <!-- Introducir boton  -->
                                    <td>
                                        <form action="mostrar_prenda.php" method="get">
                                            <button class="btn btn-primary" type="submit">Ver</button>
                                            <input type="hidden" name="id" value="<?php echo $fila["id"] ?>">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="" method="post">
                                            <button class="btn btn-danger" type="submit">🗑️</button>
                                            <input type="hidden" name="id" value="<?php echo $fila["id"] ?>">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="" method="post">
                                            <button class="btn btn-info" type="submit">📝</button>
                                            <input type="hidden" name="id" value="<?php echo $fila["id"] ?>">
                                        </form>
                                    </td>
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>
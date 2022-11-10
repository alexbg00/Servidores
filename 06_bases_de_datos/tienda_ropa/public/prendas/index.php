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
                            <th>Imagen</th>
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
                            $imagen = $_POST["imagen"];
                            $id = $_POST["id"];
                            $sql = "DELETE FROM prendas WHERE id = $id";
                            $conexion->query($sql);

                            unlink("../..$imagen");
                        }

                        ?>

                        <?php
                        $sql = "SELECT * FROM prendas";
                        $resultado = $conexion->query($sql);
                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $fila["nombre"] ?></td>
                                    <td><?php echo $fila["talla"] ?></td>
                                    <td><?php echo $fila["precio"] ?></td>
                                    <td><?php echo $fila["categoria"] ?></td>
                                    <td><img src="../../<?php echo $fila["imagen"] ?>" alt="" width="50px"></td>
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
                                            <input type="hidden" name="imagen" value="<?php echo $fila["imagen"] ?>">

                                        </form>
                                    </td>
                                    <td>
                                        <form action="" method="post">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit">📝</button>
                                            <input type="hidden" name="id" value="<?php echo $fila["id"] ?>">
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar usuario</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                                                    <!-- pasar nombre por post -->
                                                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre" value="<?php echo $fila["nombre"] ?>">

                                                                </div>
                                                                <div class="mb-3">
                                                                    <!-- poner select para las tallas -->
                                                                    <label for="exampleInputPassword1" class="form-label">Talla</label>
                                                                    <select name="talla" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                                                        <option selected><?php echo $fila["talla"]?></option>
                                                                        <option value="XS">XS</option>
                                                                        <option value="S">S</option>
                                                                        <option value="M">M</option>
                                                                        <option value="L">L</option>
                                                                        <option value="XL">XL</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputPassword1" class="form-label">Precio</label>
                                                                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $fila["precio"] ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-check-label" for="exampleCheck1">Categoria</label>
                                                                    <select name="categoria" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                                                        <option value="" > <?php echo $fila["categoria"]?></option>
                                                                        <option value="Pantalones">Pantalones</option>
                                                                        <option value="Camisetas">Camiseta</option>
                                                                        <option value="Accesorios">Accesorios</option>
                                                                    </select>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            <button type="button" class="btn btn-primary">Guardar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
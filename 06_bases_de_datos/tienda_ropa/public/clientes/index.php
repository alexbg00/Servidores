<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de clientes</title>
</head>
<body>
    <?php require "../sesion/control_de_acceso.php" ?>
    <?php require '../header.php'?>
    <?php require "../../util/base_de_datos.php" ?>




    <div class ="container">
    <h1>Listado de clientes</h1>
    <a href="insertar_cliente.php" class="btn btn-primary" style="margin:30px">Insertar cliente</a>
    <div class ="row ">
        <!-- alinear tabla en el centro -->


        <div class ="col-12">
            <table class="table table-striped  table-hover ">
                <thead>
                    <tr class="table-primary">
                    <?php   //  Borrar prenda
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $id = $_POST["id"];

                                //  Consulta para coger la ruta de la imagen y luego borrarla
                                $sql = "SELECT imagen FROM cliente WHERE id = '$id'";
                                $resultado = $conexion -> query($sql);

                                if ($resultado -> num_rows > 0) {
                                    while ($fila = $resultado -> fetch_assoc()) {
                                        $imagen = $fila["imagen"]; //  Ruta de la imagen 
                                        echo  $imagen;
                                    }
                                    if($imagen != "/resources/images/clientes/552721.jpg"){
                                        unlink("../.." . $imagen);
                                }
                            }

                                //  Consulta para borrar la prenda
                                $sql = "DELETE FROM cliente WHERE id = '$id'";

                                if ($conexion -> query($sql)) {
                                ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Se ha borrado el cliente
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                                } else {
                                    echo "<p>Error al borrar</p>";
                                }
                            }
                        ?>

                        <th>Usuario</th>
                        <th >Nombre</th>
                        <th>Primer apellido</th>
                        <th>Segundo apellido</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Avatar</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                <?php 
                    $sql = "SELECT * FROM cliente";
                    $resultado = $conexion->query($sql);
                    if($resultado->num_rows > 0){
                        while($fila = $resultado->fetch_assoc()){?>
                            <tr>
                                <td>
                                    <?php echo $fila["usuario"];
                                        $rol_usuario=$fila["rol"];

                                    if($rol_usuario == "administrador"){ 
                                        ?>
                                        <span class="badge text-bg-danger">ADMINISTRADOR</span>
                                        <!--  -->
                                    <?php
                                    }else{ ?>
                                        <span class="badge text-bg-info">Cliente</span>
                                        <!--  -->
                                    <?php

                                    }

                                    //fecha actual de hoy
                                    
                                    if($fila["fecha_nacimiento"] >= date("Y-m-d", strtotime("10-11-2004"))){
                                        ?>
                                        <span class="badge text-bg-warning">MENOR DE EDAD</span>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td><?php echo $fila["nombre"] ?></td>
                                <td><?php echo $fila["apellido_1"] ?></td>
                                <td><?php echo $fila["apellido_2"] ?></td>
                                <!-- Setter fecha de nacimiento dd/mm/yyyy -->
                                <td><?php echo date("d/m/Y", strtotime($fila["fecha_nacimiento"])) ?></td>
                                    
                                <!-- mostrar avatar -->
                                <td><img src="../..<?php echo $fila["imagen"] ?>" alt="avatar" width="70px" height="70px" style="border-radius:150px"></td>
                                <td>
                                    <form action="mostrar_cliente.php" method="get">
                                        <button class="btn btn-primary" type="submit">Ver</button>
                                        <input type="hidden" name="id" value="<?php echo $fila["id"] ?>">
                                    </form>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <button class="btn btn-danger" type="submit">Borrar</button>
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
</body>
</html>
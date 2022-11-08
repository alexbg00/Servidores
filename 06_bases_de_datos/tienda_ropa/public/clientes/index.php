<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de clientes</title>
</head>
<body>
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
                        
                        <th>Usuario</th>
                        <th >Nombre</th>
                        <th>Primer apellido</th>
                        <th>Segundo apellido</th>
                        <th>Fecha de Nacimiento</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php 
                    $sql = "SELECT * FROM cliente";
                    $resultado = $conexion->query($sql);
                    if($resultado->num_rows > 0){
                        while($fila = $resultado->fetch_assoc()){?>
                            <tr>
                                <td><?php echo $fila["usuario"] ?></td>
                                <td><?php echo $fila["nombre"] ?></td>
                                <td><?php echo $fila["apellido_1"] ?></td>
                                <td><?php echo $fila["apellido_1"] ?></td>
                                <td><?php echo $fila["fecha_nacimiento"] ?></td>

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
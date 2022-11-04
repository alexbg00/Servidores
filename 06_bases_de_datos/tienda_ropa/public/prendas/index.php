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
    <!--  -->
    <!-- acceder a base_de_datos.php -->

    <?php require "../../util/base_de_datos.php" ?>
    <div class ="container">
    <h1>Listado de prendas</h1>
    <!-- boton que redireccione a insertar_prenda.php -->
    <a class="btn btn-primary" href="insertar_prenda.php" style="margin:30px">Insertar Prenda</a>
    <div class ="row">
        <div class ="col-9">
            <table class="table table-striped  table-hover">
                <thead>
                    <tr class="table-dark">
                        <td >Nombre</td>
                        <td>Talla</td>
                        <td>Precio</td>
                        <td>Categoria</td>
                    </tr>
                </thead>

                <tbody>
                <?php 
                    $sql = "SELECT * FROM prendas";
                    $resultado = $conexion->query($sql);
                    if($resultado->num_rows > 0){
                        while($fila = $resultado->fetch_assoc()){?>
                            <tr>
                                <td><?php echo $fila["nombre"] ?></td>
                                <td><?php echo $fila["talla"] ?></td>
                                <td><?php echo $fila["precio"] ?></td>
                                <td><?php echo $fila["categoria"] ?></td>
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
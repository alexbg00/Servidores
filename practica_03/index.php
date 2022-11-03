<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Practica 3</title>
</head>
<body>
    <h1>Practica 3</h1>
    <div class = "container -sm">
    <h3>Ejercicio 1</h3>

    <!-- Crea un array que almacene nombres de productos y sus respectivos precios. Muestra en una tabla los productos con sus precios, 
    ordenados alfabéticamente por el nombre del producto. Muestra también el precio total de todos los productos y cuántos productos hay 
    en el array. -->
    <?php
        $productos = array(
            "Leche" => 1.50,
            "Pan" => 0.50,
            "Huevos" => 2.00,
            "Café" => 1.00,
            "Azúcar" => 0.80,
            "Arroz" => 1.20,
            "Fideos" => 1.00,
            "Galletas" => 1.50,
            "Mermelada" => 1.00,
            "Yogur" => 1.00
        );
        $total = 0;
        $numProductos = 0;
        ?>
        <table border='1' class ="table table-dark table-striped" style="width:50%; margin:auto " >
        <tr>
            <th>Producto</th>
            <th>Precio</th>
        </tr>
        <?php
        foreach($productos as $producto => $precio){?> 
            <tr>
                <td><?php echo $producto ?></td>
                <td><?php echo $precio ?></td>
            </tr>
            <?php
                $total += $precio;
                $numProductos++;
            ?>
        <?php
                }
            ?>

            <tr>
                <td class="table-info">Suma de todos los precios </td>
                <td class="table-info"><?php echo $total; ?></td>
            </tr>
            <tr>
                <td class="table-success">Numero de productos</td>
                <td class="table-success"><?php echo $numProductos ?></td>
            </tr>
        </table>
        

        <h3 style=margin-top:50px>Ejercicio 2</h3>
        <!--Crea un array con los productos y sus precios almacene la cantidad que se ha comprado de cada producto. Muestra en una columna adicional 
        el precio total de cada producto (producto x cantidad) y al final de la tabla el precio total de todos los productos comprados y 
        la cantidad de productos adquiridos. -->
        <?php 
        $productos = [
            "Melon" => 1.50,
            "Pera" => 0.50,
            "Manzana" => 2.00,
            "Naranja" => 1.00,
            "Platano" => 0.80,
            "Sandia" => 1.20,
            "Papaya" => 1.00,
        ];
        ?>
        <table border='1' class ="table table-danger table-striped" style="width:50%; margin:auto ">
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Precio Total</th>
        </tr>
        <?php
        $total = 0;
        $numProductos = 0;
        foreach($productos as $producto => $precio){?> 
            <tr>
                <td><?php echo $producto ?></td>
                <td><?php echo $precio ?></td>
                <td><?php echo $cantidad = rand(1,10) ?></td>
                <td><?php echo $precioTotal = $precio * $cantidad ?></td>
            </tr>
            <?php
                $total += $precioTotal;
                $numProductos += $cantidad;
            ?>
            <?php
                }
            ?>

            <tr>
                <td class="table-info">Suma de todos los precios </td>
                <td class="table-info"><?php echo $total; ?></td>
            </tr>
            <tr>
                <td class="table-success">Numero de productos</td>
                <td class="table-success"><?php echo $numProductos ?></td>
            </tr>
        </table>

        <h3 style=margin-top:50px>Ejercicio 3</h3>
        <!-- Crea un array que contenga los números del 1 al 50. Elimina mediante un bucle y la función unset los números que sean divisibles entre 3. -->
        <?php
        $numeros = [];
        for($i =1; $i<=50; $i++){
            $numeros[] = $i;
        }

        foreach($numeros as $numero){
            if($numero % 3 == 0){
                unset($numeros[$numero]);
                echo "<br>Numero eliminado: $numero";
            }
        }
        echo "<br>";
        foreach($numeros as $numero){
            echo "$numero ,";
        }
        ?>

        <h3 style=margin-top:50px>Ejercicio 4</h3>
        <!-- Crea un array de dos dimensiones que contenga el nombre de cada persona, su apellido y su edad, que será un número aleatorio entre 0 y 100.
        Muestra los datos en una tabla que además contenga una columna que indique si la persona es menor de edad, mayor de edad, o está jubilada (+65 años). 
        Utiliza funciones y la estructura match.-->
        <?php
        $personas = [
            ["nombre" => "Juan", "apellido" => "Perez", "edad" => rand(0,100)],
            ["nombre" => "Maria", "apellido" => "Gomez", "edad" => rand(0,100)],
            ["nombre" => "Pedro", "apellido" => "Lopez", "edad" => rand(0,100)],
            ["nombre" => "Ana", "apellido" => "Martinez", "edad" => rand(0,100)],
            ["nombre" => "Jose", "apellido" => "Garcia", "edad" => rand(0,100)],
            ["nombre" => "Luis", "apellido" => "Rodriguez", "edad" => rand(0,100)],
            ["nombre" => "Laura", "apellido" => "Fernandez", "edad" => rand(0,100)],
            ["nombre" => "Pablo", "apellido" => "Diaz", "edad" => rand(0,100)],
            ["nombre" => "Sara", "apellido" => "Sanchez", "edad" => rand(0,100)],
            ["nombre" => "Marta", "apellido" => "Gonzalez", "edad" => rand(0,100)],
        ];
        ?>
        <table border='1' class ="table table-primary table-striped" style="width:50%; margin:auto ">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Estado</th>
        </tr>

        <?php
        /* Funcion para la edad  */
        function estado($edad){
            $estado = match(true){
                $edad < 18 => "Menor de edad",
                $edad >= 65 => "Jubilado",
                default => "Mayor de edad",
            };
            return $estado;
        }

        foreach($personas as $persona){?>
            <tr>
                <td><?php echo $persona["nombre"] ?></td>
                <td><?php echo $persona["apellido"] ?></td>
                <td><?php echo $persona["edad"] ?></td>
                <td><?php echo estado($persona["edad"]) ?></td>
            </tr>
            <?php
                }
            
        ?>
        </table>
        <!-- Crea un array que contenga el DNI y el nombre de cada persona. Muestra esa información en una tabla en la que además indiques si el DNI introducido es 
        correcto. Comprueba si el DNI es correcto o no en una función.  -->
        <h3>Ejercicio 5</h3>
        <?php
        $personas2 = [
            "77662320-Z" => "Juan Perez",
            "79234522-B" => "Maria Gomez",
            "552269-Z" => "Pedro Lopez",
            "79011130-N" => "Ana Martinez",
            "79234522-B" => "Jose Garcia",
            "942457-C" => "Luis Rodriguez",
            "5039279-@" => "Laura Fernandez",
        ];
        
        /* funcion DNI */
        function comprobarDni($dni){
            $partes = explode('-', $dni);
            $numeros = $partes[0];
            $letra = strtoupper($partes[1]);
            if (substr("TRWAGMYFPDXBNJZSQVHLCKE",$numeros%23,1) == $letra)
                echo '<p>✅</p>';
            else
                echo '<p>❌</p>';
        }

        ?>

        <table border='1' class ="table table-Warning table-striped" style="width:50%; margin:auto ">
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Validez DNI</th>
        </tr>
        <?php
        foreach($personas2 as $dni => $nombre){?>
            <tr>
                <td><?php echo $dni ?></td>
                <td><?php echo $nombre ?></td>
                <td><?php echo comprobarDni($dni) ?></td>
            </tr>
            <?php
            }?>
        </table>


        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>
</html>
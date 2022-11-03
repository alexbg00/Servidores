<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Arrays</title>
</head>
<body>
    <?php
        //  ARRAY SERIES

        $series = [
            'El juego del calamar',
            'La casa de papel',
            'Alice in borderland',
            'The Witcher'
        ];    
        //  Inserta dos elementos al final del array
        array_push($series, "Cuéntame", "Dark");

        //  Inserta un elemento al final del array
        $series[] = "Big Bang Theory";

        //  Inserta un elemento en la posición 10, o lo
        //  modifica en caso de existir previamente
        $series[10] = "La que se avecina";

        //  Añade un elemento al final del array, en
        //  este caso en la posición 11 (coge como 
        //  última posición la del elemento con el 
        //  último índice usado)
        array_push($series, "Haikyuu");

        //  Elimina el elemento de la posición 10
        unset($series[10]);

        //  Reseta todas las claves del array y las vuelve
        //  a asignar numéricamente a partir del 0
        $series = array_values($series);
        
    
        //  ARRAY PERSONAS

        $personas = [
            "23242627F" => "Albertiño",
            "95542627T" => "Armando",
            "87234455G" => "Pepe"
        ];
        
        //  Añade una persona con la clave "12345678D"
        $personas["12345678D"] = "Rodolfo";

        //  Modifica la persona con la clave "87234455G"
        $personas["87234455G"] = "Ruperto";

        //  Elimina la persona con la clave "23242627F"
        unset($personas["23242627F"]);

        //  Ordena las personas por el nombre (valor)
        asort($personas);

        echo "<h3>Tabla de personas ordenada por nombre</h3>";
        echo "<table>";
        echo "<tr>";
        echo "<th>DNI</th>";
        echo "<th>Nombre</th>";
        echo "</tr>";
        foreach ($personas as $dni => $nombre) {
            echo "<tr>";
            echo "<td>" . $dni . "</td>";
            echo "<td>" . $nombre . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "<br><br>";
    ?>  

    <!-- Tabla foreach para las personas -->
    <h3>Tabla de persona ordenada por DNI al revés</h3>
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
        </tr>
        <?php
            //  Ordena las personas por el DNI (clave) al revés 
            krsort($personas);
            foreach ($personas as $dni => $nombre) {
                ?>
                <tr>
                    <td><?php echo $dni ?></td>
                    <td><?php echo $nombre ?></td>
                </tr>
                <?php
            }
        ?>
    </table>

    <br>
    
    <!-- Lista para las series -->
    <h3>Lista series con For</h3>
    <ul>
        <?php
        sort($series);
        for ($i = 0; $i < count($series); $i++) {
        ?>
            <li><?php echo $series[$i] ?></li>
        <?php
        }
        ?>
    </ul>

    <br>

    <h3>Lista series con Foreach</h3>
    <ul>
        <?php
        asort($series);
        foreach ($series as $serie) {
        ?>
            <li><?php echo $serie ?></li>
        <?php
        }
        ?>
    </ul>

    <br>

    <!-- Bucle while para las series -->
    <h3>Lista series con While</h3>
    <ul>
        <?php 
        $i = 0;
        while ($i < count($series)) {
        ?>
            <li><?php echo $series[$i] ?></li>
        <?php
            $i++;
        }
        ?>
    </ul>

    <br>

    <?php
        $frutas_1 = ["Melocotón" => 0.5, "Sandía" => 1, "Kiwi" => 2];

        $frutas_2 = ["Sandía" => 1, "Melocotón" => 0.5, "Kiwi" => 2];
    ?>

    <h3>Lista 1 de frutas</h3>
    <ol>
    <?php 
        foreach ($frutas_1 as $fruta => $precio) {
        ?>
            <li><?php echo $fruta . " cuesta " . $precio ?></li>
        <?php
        }
        ?>
    </ol>

    <br>

    <h3>Lista 2 de frutas</h3>
    <ol>
        <?php 
        foreach ($frutas_2 as $fruta => $precio) {
        ?>
            <li><?php echo $fruta . " cuesta " . $precio ?></li>
        <?php
        }
        ?>
    </ol>

    <br>

    <?php
        if ($frutas_1 == $frutas_2) {
            if ($frutas_1 === $frutas_2) {
                echo "<p>Las frutas son las mismas y están igual ordenadas</p>";
            } else {
                echo "<p>Las frutas son las mismas pero no están igual ordenadas</p>";
            }
        } else {
            echo "<p>Las frutas no son las mismas</p>";
        }
    ?>
</body>
</html>
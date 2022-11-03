<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Documento</title>
</head>
<body>
    <!-- Crea un array multidimensional que contenga la siguiente información de series: título, plataforma y temporadas.
Crea al menos 5 series con sus respectivos títulos, plataforma y temporadas.
Muéstralos en tres tablas. Una los mostrará tal y como los has añadido, otra ordenados por temporada (de menor a mayor) y otra ordenados por la plataforma a la que pertecenen, y si la plataforma es igual, por el título. -->
    <?php
    $series = [
        ["The Walking Dead", "AMC",10],
        ["Breaking Bad", "AMC",5],
        ["The Big Bang Theory", "CBS",12],
        ["Game of Thrones", "HBO",8],
        ["The Mandalorian", "Disney+",2],
    ];

    ?>

    <table>
        <tr>
            <th>Titulo</th>
            <th>Plataforma</th>
            <th>Temporadas</th>
        </tr>
        <?php
        
        $temporadas = array_column($series, 2);
        array_multisort($temporadas, SORT_ASC, $series);

        foreach($series as $serie){
            list($titulo, $plataforma, $temporadas) = $serie;
    
        ?>
        <tr>
            <td><?php echo $titulo; ?></td>
            <td><?php echo $plataforma; ?></td>
            <td><?php echo $temporadas; ?></td>
        </tr>
        <?php
        }
        ?>
    </table>

</body>
</html>
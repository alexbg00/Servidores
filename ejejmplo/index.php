<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Por orden de insercion</h1>

    <?php
    $peliculas = [
        ["HAviacion", 4, 2003],
        ["Cars 2", 2, 2022],
        ["cola",3,2021]
    ];

    /* añadir pelicula al array con un metodo*/
    array_push($peliculas, ["Avengers", 5, 2021]);
    /* eliminar de array */
    unset($peliculas[1]);

    
    ?>
    <!-- tabla del array pelicula por orden de insercion -->
    <table border="1">
        <tr>
            <th>Titulo</th>
            <th>Valoracion</th>
            <th>Año</th>
        </tr>
        <?php
        foreach ($peliculas as $pelicula) {
            echo "<tr>";
            foreach ($pelicula as $valor) {
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
        ?>
        <p>--------------------------</p>

    <h1>Por orden alfabetico</h1>
    <!-- tabla del array pelicula por orden alfabetico del titulo -->
    <table border="1">
        <tr>
            <th>Titulo</th>
            <th>Valoracion</th>
            <th>Año</th>
        </tr>
        <?php
        /* ordenar array por titulo */
        sort($peliculas);
        foreach ($peliculas as $pelicula) {
            echo "<tr>";
            foreach ($pelicula as $valor) {
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
        ?>
        <p>--------------------------</p>
    
</body>
</html>
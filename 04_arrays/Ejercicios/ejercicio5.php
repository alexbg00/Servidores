<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class ="container">
    <!-- Crear un array de estudiantes y, aleatoriamente, asignarles una nota del 0 al 10. 
Mostrar los estudiantes en una tabla que contenga sus nombres, la nota que han sacado y la calificación final (suspenso, aprobado, notable o sobresaliente).
Ordenar los estudiantes por orden alfabético.-->
<?php
    $estudiantes = [
        "Juan" => rand(0, 10),
        "Bartolo" => rand(0, 10),
        "Pedro" => rand(0, 10),
        "Maria" => rand(0, 10),
        "Luis" => rand(0, 10),
        "Ana" => rand(0, 10),
        "Jose" => rand(0, 10),
        "Rosa" => rand(0, 10),
        "Luisa" => rand(0, 10),
        "Pablo" => rand(0, 10),
        "Marta" => rand(0, 10),
        "Ramon" => rand(0, 10)
    ];

    function calificacion(int $nota){
        if($nota < 5){
            $calificacion = "Suspenso";
        }else if($nota >= 5 && $nota < 7){
            $calificacion = "Aprobado";
        }else if($nota >= 7 && $nota < 9){
            $calificacion = "Notable";
        }else if($nota >= 9 && $nota <= 10){
            $calificacion = "Sobresaliente";
        }
            return $calificacion;
    }

    //ordenar alfabeticamente los estudiantes
    ksort($estudiantes);
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Nota</th><th>Calificacion</th></tr>";
    foreach($estudiantes as $nombre => $nota){
        echo "<tr><td>$nombre</td><td>$nota</td><td>".calificacion($nota)."</td></tr>";
    }
    echo "</table>";
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
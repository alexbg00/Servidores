<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 2</h1>

    <?php
        $numeros = [];
        for($i = 1; $i <= 10; $i++){
            $numeros = rand(0, 100);
            
        }
        print_r($numeros);


        
    ?>
    <h2>Numeros ordenador de mayor a menor</h2>
    <ul>
        <?php
        rsort($numeros);
            for($i = 0; $i < count($numeros); $i++){
                echo "<li>".$numeros[$i]."</li>";
            }
        ?>
    <h2>Numeros ordenador de menor a mayor</h2>
    <ul>
        <?php
        sort($numeros);
            for($i = 0; $i < count($numeros); $i++){
                echo "<li>".$numeros[$i]."</li>";
            }
        ?>
    </ul>


</body>
</html>
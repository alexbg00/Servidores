<h1>Ejercicio 6</h1>

<?php
    $numero = $_GET["numero"];

    $resultado = 1;

    if ($numero >= 1) {
        for ($i = 1; $i <= $numero; $i++) {
            $resultado = $resultado * $i;
            //  Sintaxis alternativa: $resultado *= $i;
        }
        echo "<p>$resultado</p>";
    } else {
        echo "<p>El número debe ser igual o más que 1</p>";
    }

?>
<?php
    $frase = $_GET["frase"];
    $e = $_GET["encabezado"];

    echo "<h$e>$frase</h$e>";

    echo "<h" . $e . ">" . $frase . "</h" . $e . ">";
?>
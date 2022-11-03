<?php
    $nombre = $_GET["nombre"];
    $edad = (int)$_GET["edad"];

    $nombre = ucwords(strtolower($nombre));

    if ($edad < 18 && $edad >= 0) {
        echo "<p>$nombre es menor edad</p>";
    } else if ($edad >= 18 && $edad <= 65) {
        echo "<p>$nombre es adulto</p>";
    } else if ($edad > 65 && $edad < 130) {
        echo "<p>$nombre se ha jubilado</p>";
    } else {
        echo "<p>La edad no es válida</p>";
    }
?>

<!-- Comentario HTML --> 
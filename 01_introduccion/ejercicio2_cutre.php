<?php
    /*  EJERCICIO 2

        Imprimir los múltiplos de 3 entre 0 y 30
        en "formato array"

        [3, 6, 9, ... 30]
    */

    echo "[";
    for ($i = 3; $i <= 30; $i+=3) {
        if ($i < 30) {
            echo "$i,";
        } else {
            echo "$i";
        }
        
    }
    echo "]";
?>
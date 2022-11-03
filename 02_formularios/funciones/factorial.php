<?php
    function factorial(int $numero) {
        $resultado = 1;
        for ($i = 1; $i <= $numero; $i++) {
            $resultado = $resultado * $i;
        }
        return $resultado;
    }
?>
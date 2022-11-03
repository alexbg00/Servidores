<?php
    /**
     * Devuelve el resultado de elevar $base a $exponente
     * Si la $exponente es menor que 0, devuelve -1
    */
    function potencia(int $base, int $exponente) {
        $resultado = 1;
        if ($exponente < 0) {
            $resultado = -1;
        } else if ($exponente == 0) {
            $resultado = 1;
        } else {
            for ($i = 1; $i <= $exponente; $i++) {
                //$resultado = $resultado * $base;
                $resultado *= $base;
            }
        }
        return $resultado;
    }
?>
/*Crea un array que contenga los numeros pares del 1 al 50 y imprimirlo */
    <?php
        $pares = [];
        for ($i=1; $i <= 50; $i++) { 
            if ($i % 2 == 0) {
                array_push($pares, $i);
            }
        }
        print_r($pares);
        
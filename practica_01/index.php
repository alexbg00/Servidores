

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- añadir css -->
    <link rel="stylesheet" href="style.css">
    <title>Validacion de Formaulario</title>
</head>
<body>

<!-- EJERCICICIO 1 -->
    <!-- Un número primo es aquel que sólo es divisible entre sí mismo y 1. Crea un formulario que reciba dos números “a” y “b”. 
    El formulario devolverá como respuesta los “a” primeros números primos empezando por “b”. 
    Ej.: Si a=3 y b=4, se devolverán los tres primeros números primos empezando por 4. Es decir, 5, 7 y 11. -->
    <div class="parte1">
    <form action="index.php" method="post">
        <label for="a">Numero a</label>
        <input type="number" name="a" id="a">
        <label for="b">Numero b</label>
        <input type="number" name="b" id="b">
        <input type="submit" value="Enviar">
    </form>
    </div>

    <?php
    // EJERCICIO 1
    if(isset($_POST['a']) && isset($_POST['b'])){
        $a = $_POST['a'];
        $b = $_POST['b'];
        $cont = 0;
        $num = $b;
        while($cont < $a){
            $div = 0;
            for($i = 1; $i <= $num; $i++){
                if($num % $i == 0){
                    $div++;
                }
            }
            if($div == 2){
                echo $num . "<br>";
                $cont++;
            }
            $num++;
        }
    }

    ?>



    <div class="parte2">
        <form action="index.php" method="post">
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni">
            <input type="submit" value="Comprobar" id="btnComprobar">
        </form>
    </div>
    
    
    <?php
    function validar_dni($dni){
        
        $letra = substr($dni, -1);
        //transformamos la letra a mayuscula
        $letra = strtoupper($letra);
        $numeros = substr($dni, 0, -1);
        if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
            echo 'DNI valido:'.$dni;
        }
        if(!isset($dni)){
            echo "El campo no puede estar vacio";
        
        }
        else{
            echo 'DNI no valido: '.$dni . "  --> EJEMPLO: 12345678A";
        }
    }

    validar_dni($_POST['dni']);

    ?>
    



    <div class ="parte3">
        <!-- mostrar las tablas de multiplicar del 1 al 10 -->

        <?php 
            $multiplicando;
            $multiplicador;

            echo "<table text-align:center; border=4;>";
            echo "<tr>";
            for ($tabla=1; $tabla<=10  ; $tabla++) { 
                echo "<td>Tabla del $tabla </td>";
            }
            echo "</tr>";
            echo "<tr>";
            for ($multiplicador=1; $multiplicador <=10 ; $multiplicador++) { 
                for ($multiplicando=01; $multiplicando <=10 ; $multiplicando++) { 
                    echo "<td>$multiplicando X $multiplicador =";
                    echo ($multiplicando *$multiplicador);
                    echo "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>


</body>
</html>
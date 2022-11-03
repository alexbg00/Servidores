<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Practica 2</title>
</head>

<body>
    <h1>Práctica 2</h1>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_dni = depurar($_POST["dni"]);
        $temp_nombre = depurar($_POST["nombre"]);
        $temp_primerApellido = depurar($_POST["primerApellido"]);
        $temp_segundoApellido = depurar($_POST["segundoApellido"]);
        $temp_edad = depurar($_POST["edad"]);
        $temp_email = depurar($_POST["email"]);


        if (empty($temp_dni)) {
            $error_dni = "El DNI es obligatorio";
        } else {
            $pattern = "/^[0-9]{8}[a-zA-Z]$/";


        if (!preg_match($pattern, $temp_dni)) {
                $error_dni = "El dni debe de tener 8 dígitos y una letra ";
            } else {
                $temp_dni = substr($temp_dni, 0, -1);
                $letras = strtoupper(substr($temp_dni, -1));
                if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $temp_dni % 23, 1) == $letras && strlen($letras) == 1 &&  strlen($temp_dni) == 8) {
                    $dni = $temp_dni;
                    echo "<p>$dni</p>";
                } else {
                    $error_dni = "El dni debe de tener 8 dígitos y un carácter";
                }
            }
        }


        if (empty($temp_nombre)) {
            $error_nombre = "El nombre es obligatorio";
        } else {

            $pattern = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/";

            if (!preg_match($pattern, $temp_nombre)) {
                $error_nombre = "El nombre solo puede contener letras";
            } else {
                $nombre = ucwords(strtolower($temp_nombre));;
                echo "<p>$nombre</p>";
            }
        }

        if (empty($temp_primerApellido)) {
            $error_primerApellido = "El primer apellido es obligatorio";
        } else {
            ucwords(strtolower($temp_primerApellido));
            $pattern = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/";

            if (!preg_match($pattern, $temp_primerApellido)) {
                $error_primerApellido = "El primer apellido solo puede contener letras";
            } else {
                $primerApellido = $temp_primerApellido;
                echo "<p>$primerApellido</p>";
            }
        }


        if (empty($temp_segundoApellido)) {
            $error_segundoApellido = "El segundo apellido es obligatorio";
        } else {
            $pattern = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/";

            if (!preg_match($pattern, $temp_segundoApellido)) {
                $error_segundoApellido = "El segundo apellido solo puede contener letras";
            } else {
                $segundoApellido = $temp_segundoApellido;
                echo "<p>$segundoApellido</p>";
            }
        }




        if (empty($temp_edad)) {
            $error_edad = "La edad es obligatoria";
        } else {
            if ($temp_edad < 0 || $temp_edad >= 120) {
                $error_edad = "Solo se admiten edades entre 0 y 120 años";
            } else {
                if ($temp_edad < 18) {
                    $error_edad = "Eres menor de edad";
                } else {
                    $edad = $temp_edad;
                    echo "<p$edad</p>";
                }
            }
        }


        //Comprobar que el email sea correcto y no contenga palabras malsonantes
        //crear array de palabras malsonantes
        if (empty($temp_email)) {
            $error_email = "El email es obligatorio";
        } else {
            $pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/";

            if (!preg_match($pattern, $temp_email)) {
                $error_email = "El email no es correcto";
            } else {
                
                if (strpos($temp_email, "idiota") !== false || strpos($temp_email, "tonto") !== false ) {
                    $error_email = "El email no puede contener palabra malsonantes";
                } else {
                    $email = $temp_email;
                    echo "<p>$email</p>";
                }
            }
        }




    }




    // Función para depurar los datos de entrada 
    function depurar($dato)
    {
        $dato = trim($dato);
        $dato = stripslashes($dato);
        $dato = htmlspecialchars($dato);
        return $dato;
    }
    ?>


    <!-- MAQUETA DEL FORMULARIO DNI, NOMBRE, PRIMER Y SEGUNDO APELLIDO,EDAD ,EMAIL -->
    <div class = "container">
    <div class="formulario">
        <form action="" method="POST" class="mb-3>

            <label for="dni" class="form-label">DNI</label><br>
            <input type="text" name="dni">
            <span class="error">
                *<?php
                    if (isset($error_dni)) echo $error_dni
                    ?>
            </span>
            <br><br>

            <label for="nombre" class="form-label">Nombre</label><br>
            <input type="text" name="nombre">
            <span class="error">
                *<?php
                    if (isset($error_nombre)) echo $error_nombre
                ?>
            </span>
            <br><br>

            <label for="primerApellido" class="form-label">Primer Apellido</label><br>
            <input type="text" name="primerApellido">
            <span class="error">
                *<?php
                    if (isset($error_primerApellido)) echo $error_primerApellido
                ?>
            </span>
            <br><br>

            <label for="segundoApellido" class="form-label">Segundo Apellido</label><br>
            <input type="text" name="segundoApellido">
            <span class="error">
                *<?php
                    if (isset($error_segundoApellido)) echo $error_segundoApellido
                ?>
            </span>
            <br><br>

            <label for="edad" class="form-label">Edad</label><br>
            <input type="number" name="edad">
            <span class="error">
                *<?php
                    if (isset($error_edad)) echo $error_edad
                ?>
            </span>
            <br><br>

            <label for="email" class="form-label"></label>Email<br>
            <input type="text" name="email">
            <span class="error">
                *<?php
                    if (isset($error_email)) echo $error_email
                    ?>
            </span>
            <br><br>

            <input type="submit" value="Enviar" class="btn btn-success">

        </form>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>
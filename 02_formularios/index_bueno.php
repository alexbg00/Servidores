<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"></meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
    <!--<link rel="stylesheet" href="styles.css">-->
    <title>Formularios</title>
</head>
<body>
    <h1>Ejercicios de clase de formularios</h1>

    <div>
        <h2 id="ej1">Ejercicio 1</h2>
        <p>Formulario que reciba un nombre y una edad y los muestre por pantalla</p>
        <form action="#ej1" method="post">
            <label>Nombre</label><br>
            <input type="text" name="nombre"><br><br>
            <label>Edad</label><br>
            <input type="text" name="edad"><br><br>
            <input type="hidden" name="f" value="ej1">
            <input type="submit" value="Enviar">
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["f"] == "ej1") {
                    $nombre = $_POST["nombre"];
                    $edad = $_POST["edad"];

                    echo "<p>$nombre</p>";
                    echo "<p>$edad</p>";
                }
            }
        ?>
    </div>

    <div>
        <h2 id="ej2">Ejercicio 2</h2>
        <p>Crear un formulario que reciba un número. Generar una lista dinámicamente con tantos elementos como se haya indicado</p>
        <form action="#ej2" method="post">
            <label>Número</label><br>
            <input type="text" name="numero"><br><br>
            <input type="hidden" name="f" value="ej2">
            <input type="submit" value="Enviar">
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["f"] == "ej2") {
                    $n = $_POST["numero"];
                    for ($i = 1; $i <= $n; $i++) {
                        echo "<li>$i</li>";
                    }
                }
            }
        ?>
    </div>

    <div>
        <h2 id="ej3">Ejercicio 3</h2>
        <p>Crear un formulario que reciba el nombre y la edad de una persona y muestre por pantalla si es menor de edad, es adulta, o está jubilada en función a su edad. Además:</p>
        <p>- Convertir la edad a un número entero<br>- Convertir el nombre introducido a minúsculas salvo la primera letra, que será mayúscula</p>
        <form action="#ej3" method="post">
            <label>Nombre</label><br>
            <input type="text" name="nombre"><br><br>
            <label>Edad</label><br>
            <input type="text" name="edad"><br><br>
            <input type="hidden" name="f" value="ej3">
            <input type="submit" value="Enviar">
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["f"] == "ej3") {
                    $nombre = $_POST["nombre"];
                    $edad = (int)$_POST["edad"];

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
                }
            }
        ?>
    </div>

    <div>
        <h2>
            <a href="ejercicio4.php">Ejercicio 4</a>
        </h2>
        <p>Crear un formulario que reciba una frase y un número del 1 al 6. Habrá que mostrar la frase en un encabezado de dicho número.</p>
    </div>

    <div>
        <h2 id="ej5">Ejercicio 5</h2>
        <p>Formulario que reciba dos números. Devolver el resultado de elevar el primero al segundo. Asegurarse de que funciona con cualquier valor válido. No se admiten exponentes negativos.</p>
        <form action="#ej5" method="post">
            <label>Base</label><br>
            <input type="text" name="base"><br><br>
            <label>Exponente</label><br>
            <input type="text" name="exponente"><br><br>
            <input type="hidden" name="f" value="ej5">
            <input type="submit" value="Enviar">
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["f"] == "ej5") {
                    require 'funciones/potencia.php';
                    $base = $_POST["base"];
                    $exponente = $_POST["exponente"];
                    $resultado = potencia($base, $exponente);
                    if ($resultado == -1) {
                        echo "<p>El número no puede ser negativo</p>";
                    } else {
                        echo "<p>El resultado es $resultado</p>";
                    }
                }
            }
        ?>
    </div>

    <div>
        <h2 id="ej6">Ejercicio 6</h2>
        <p>Formulario que reciba un número. Devolver el factorial de dicho número.</p>
        <form action="#ej6" method="post">
            <label>Número</label><br>
            <input type="text" name="numero"><br><br>
            <input type="hidden" name="f" value="ej6">
            <input type="submit" value="Enviar">
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["f"] == "ej6") {
                    require 'funciones/factorial.php';
                    $numero = $_POST["numero"];
                    $resultado = factorial($numero);
                    echo "<p>El resultado es $resultado</p>";
                }
            }
        ?>
    </div>
    <div>
        <h2 id="ej8">Ejercicio 8</h2>
        <p>Crea un formulario que reciba un número y muestre la tabla de multiplicar de dicho número</p>
        <form action="#ej8" method="post">
            <label>Número</label><br>
            <input type="text" name="numero"><br><br>
            <input type="hidden" name="f" value="ej8">
            <input type="submit" value="Enviar">
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["f"] == "ej8") {
                    $numero = $_POST["numero"];
                    echo "<table>";
                    echo "<tr><th>Tabla del $numero</th></tr>";
                    for ($i = 1; $i <= 10; $i++) {
                        echo "<tr>";
                        echo "<td>$numero x $i</td>";
                        echo "<td>" . $numero * $i . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
        ?>
    </div>
</body>
</html>
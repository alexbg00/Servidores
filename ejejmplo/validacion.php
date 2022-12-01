<!-- validar formulario php -->
<?php
/* el titulo es obligatorio y solo se admite letras o numeros */
if (isset($_POST['titulo']) && !empty($_POST['titulo']) && preg_match("/^[a-zA-Z0-9]+$/", $_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    echo "correcto-titulo";
} else {
    $error = "El titulo es obligatorio y solo se admite letras o numeros";
}

if(isset($_POST['capitulos']) && !empty($_POST['capitulos']) && preg_match("/^[0-9]+$/", $_POST['capitulos'])){
    $capitulos = $_POST['capitulos'];
}else{
    $error = "El numero de capitulos es obligatorio y solo se admite numeros";
}




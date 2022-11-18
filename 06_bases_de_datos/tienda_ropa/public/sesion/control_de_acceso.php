<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:http://06_bases_de_datos.test/tienda_ropa/public/sesion/login.php");
} else {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Has iniciado con: <strong><?php echo $_SESSION["usuario"] ?> </strong> como <strong><?php echo $_SESSION["rol"] ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>
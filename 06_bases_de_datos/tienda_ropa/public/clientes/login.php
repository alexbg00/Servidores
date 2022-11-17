<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body class="bg-info d-flex justify-content-center align-items-center vh-100">
    <?php require "../../util/base_de_datos.php" ?>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $usuario = $_POST["usuario"];
      $contrasena = $_POST["contrasena"];

      $sql = "SELECT * FROM cliente WHERE usuario = '$usuario'";
      $resultado = $conexion -> query($sql);

      if($resultado -> num_rows > 0){
          while($fila = $resultado -> fetch_assoc()){
              $hash_contrasena = $fila["contrasena"];
          }
          $acceso_valido = password_verify($contrasena, $hash_contrasena); //true o false
          if($acceso_valido){
              header("Location: index.php");
              
              session_start();
              $_SESSION["usuario"] = $usuario;
          }else{
              echo "contraseña incorrecto";
          }
      }else{
          echo "Usuario incorrecto";
      }
  }
  ?>
    

<div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 25rem">
    <div class="d-flex justify-content-center">
      <img src="../../assets/login-icon.svg" alt="login-icon" style="height: 7rem" />
    </div>
    <div class="text-center fs-1 fw-bold">Login</div>
    <div class="input-group mt-4">
      <div class="input-group-text bg-info">
        <img src="../../assets/username-icon.svg" alt="username-icon" style="height: 1rem" />
      </div>

      <form action="" method="post">
      <input class="form-control bg-light" type="text" name="usuario" placeholder="Usuario" />
    </div>
    <div class="input-group mt-1">
      <div class="input-group-text bg-info">
        <img src="../../assets/password-icon.svg" alt="password-icon" style="height: 1rem" />
      </div>
      <input class="form-control bg-light" type="password" name="contrasena" placeholder="Contraseña" />
    </div>
    <div class="d-flex justify-content-around mt-1">
      <div class="d-flex align-items-center gap-1">
        <input class="form-check-input" type="checkbox" />
        <div class="pt-1" style="font-size: 0.9rem">Recordarme</div>
      </div>
      <div class="pt-1">
        <a href="#" class="text-decoration-none text-info fw-semibold fst-italic" style="font-size: 0.9rem">¿Has olvidado la contraseña?</a>
      </div>
    </div>
    <button class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm" type="submit">Iniciar Sesion</button>

  </form>
    <div class="d-flex gap-1 justify-content-center mt-1">
      <div>¿No tienes cuenta?</div>
      <a href="./registro.php" class="text-decoration-none text-info fw-semibold">Registrarte</a>
    </div>
    
    
  </body>
  
</html>
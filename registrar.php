<?php
  include 'cn.php';
  $nombre = $_POST["nombre"];
  $apellidos = $_POST["apellidos"];
  $correo = $_POST["correo"];
  $usuario = $_POST["usuario"];
  $contraseña = $_POST["contraseña"];
  $telefono = $_POST["telefono"];

  $insertar = "INSERT INTO personas(usuario, contraseña, correo, telefono, nombre, apellidos) VALUES ('$usuario', '$contraseña', '$correo', '$telefono', '$nombre', '$apellidos')";
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM personas WHERE usuario = '$usuario'");
    if(mysqli_num_rows($verificar_usuario) > 0){
      echo '<script>
            alert("El usuario ya esta registrado")
            window.history.go(-1);
            </script>';
      exit;
    }
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM personas WHERE correo = '$correo'");
    if(mysqli_num_rows($verificar_correo) > 0){
      echo '<script>
            alert("El correo ya esta registrado")
            window.history.go(-1);
            </script>';
      exit;
    }
      $resultado = mysqli_query($conexion, $insertar);
  if(!$resultado){
    echo 'error al registrarse';
  }
  else{
    echo '<script>
          alert("Usted ah sido registrado exitosamente")
          window.history.go(-1);
          </script>';
    exit;
  }

mysqli_close($conexion);

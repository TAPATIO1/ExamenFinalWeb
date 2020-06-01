<?php
$usuario = $_POST['usuario'];
$contraseña=$_POST['contraseña'];

$conexion=mysqli_connect("localhost", "root", "", "bdfinal");
$consulta="SELECT * FROM personas WHERE usuario = '$usuario' and contraseña = '$contraseña'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);
if($filas>0) {
  header("location:bienvenidos.html");
}
else{
  echo '<script>
        alert("Error al iniciar sesion")
        window.history.go(-1);
        </script>';
  exit;
}
mysqli_free_result($resultado);
mysqli_close($conexion);

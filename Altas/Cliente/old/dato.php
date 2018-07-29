<?php
include 'conexion.php';

$nombre =$_POST['nombre'];
$pw=$_POST['pw'];

$validar="SELECT * FROM user WHERE usuario='$nombre' AND contrasena='$pw'";
$resultado=mysqli_query($con,$validar);

$fila=mysqli_num_rows($resultado);

if($fila>0){

	header("location:roles.php");
}else{
	echo "error";
}
mysqli_free_result($resultado);
mysqli_close($con);
 ?>

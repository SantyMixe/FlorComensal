<?php

include 'conexion.php';
if (!empty($_POST)) {
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$celular=$_POST['celular'];
$personas=$_POST['personas'];
$tipo=$_POST['tipo'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];


 $ins = $con -> mysqli_query("INSERT INTO reservar (id,nombre,correo,celular,personas,tipo,fecha,hora) VALUES ('','$nombre','$correo','$celular','$personas','$tipo','$fecha','$hora')");
    echo"registrado";
if ($ins == 1){
    echo"registrado";
	 header("location:reservaciones.php");

}
}
?>
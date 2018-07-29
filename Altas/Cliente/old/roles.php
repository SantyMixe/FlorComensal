<?php
include 'conexion.php';

//Recibimos las dos variables
$usuario=$_POST['nombre'];
$password=$_POST['ps'];

/* Realizamos una consulta por cada tabla para buscar en que tabla se encuentra
el usuario que está intentando acceder */
$cliente = "SELECT * FROM cliente WHERE nombre = '$usuario' AND ps = '$password'";
$resultado1=mysqli_query($con,$cliente);

$chef = "SELECT * FROM chef WHERE nombre = '$usuario' AND ps = '$password'";
$resultado2=mysqli_query($con,$chef);

$empleado = "SELECT * FROM empleado WHERE nombre = '$usuario' AND ps = '$password'";
$resultado3=mysqli_query($con,$empleado);

/* Sabemos que en el caso que exista el usuario se encontrará en una de estas
tres tablas, por lo tanto se guardará en alguno de nuestras tres variables
que guardan nuestra consulta */

/* Ahora comprobamos que variable contiene al usuario*/
if(mysqli_num_rows($resultado1) > 0)
{
    /* Si entra en este if significa que el que intenta acceder es un alumno,
    por lo tanto le creamos una sesión */
    session_start();

    $_SESSION['cliente']="$usuario";

    /* Nos dirigimos al espacio de los alumnos usando header que nos
    redireccionará a la página que le indiquemos */
    header("Location: clientes.php");

    /* terminamos la ejecución ya que si redireccionamos ya no nos interesa
    seguir ejecutando código de este archivo */
    exit();
}

/* Ahora comprobamos si el que intenta acceder es un profesor */
else if(mysqli_num_rows($resultado2) > 0)
{
    session_start();
    $_SESSION['chef']="$usuario";
    header("Location: chef.php");
    exit();
}

//comprobamos si es un director el que intenta abrir la sesión
else if(mysqli_num_rows($resultado3) > 0)
{
    session_start();
    $_SESSION['empleado']="$usuario";
    header("Location: empleado.php");
    exit();
}
else
{
   /* Si no el usuario no se encuentra en ninguna de las tres tablas
   imprime el siguiente mensaje */
   $mensajeaccesoincorrecto = "El usuario y la contraseña son incorrectos, por favor vuelva a introducirlos.";
   echo $mensajeaccesoincorrecto;

   mysqli_free_result($resultado1);
   mysqli_free_result($resultado2);
   mysqli_free_result($resultado3);
   mysqli_close($con);
}
 ?>

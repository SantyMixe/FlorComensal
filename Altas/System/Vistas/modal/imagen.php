
<?php
// Conexion a la base de datos
$con=mysqli_connect('localhost','root','tlahuitoltepec') or die(mysqli_error());
mysqli_select_db($con,'laflor') or die(mysqli_error());

// Comprobamos si ha ocurrido un error.
if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0)
{
    echo "Ha ocurrido un error.";
}
else
{
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
    {

        // Archivo temporal
        $imagen_temporal = $_FILES['imagen']['tmp_name'];

        // Tipo de archivo
        $tipo = $_FILES['imagen']['type'];

        // Leemos el contenido del archivo temporal en binario.
        $fp = fopen($imagen_temporal, 'r+b');
        $data = fread($fp, filesize($imagen_temporal));
        fclose($fp);

        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
        // $data=file_get_contents($imagen_temporal);

        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
        $data = mysqli_escape_string($con,$data);
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];
        $come=$_POST['come'];
      //  $descripcion=$_POST['descripcion'];

        // Insertamos en la base de datos.
        $resultado = mysqli_query($con,"INSERT INTO platillos (nombre,precio,descripcion,imagen,tipo_imagen) VALUES ('$nombre','$precio','$come','$data','$tipo')");

        if ($resultado)
        {
          header("location:platillos.php");
        }
        else
        {
            echo "Ocurrió algun error al copiar el archivo.";
        }
    }
    else
    {
        echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}
?>

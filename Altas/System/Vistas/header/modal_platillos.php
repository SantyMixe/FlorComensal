<?php
 //require_once 'Vistas/modules/ventas/conexion.php';
 $con=mysqli_connect('localhost','root','tlahuitoltepec') or die(mysqli_error());
 mysqli_select_db($con,'comensal') or die(mysqli_error());

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
         //  header("location:platillos.php");
             echo "exito";
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
  <div class="modal fade bd-example-modal-lg" id="productos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <!--     <span aria-hidden="true">&times;</span> -->
          </button>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><i class="fa fa-list"> </i> Nuevo Producto</li>
          </ol>
        </div>
        <div class="modal-body">

          <form action="" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nombre Producto:</label>
                <input type="text" class="form-control" id="recipient-name" name="nombre" required="">
              </div>
            </div>
               <div class="col-md-6">
             <div class="form-group">
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Precio Producto :</label>
              <input type="text" class="form-control" id="recipient-name" name="precio" required="">
            </div>
            </div>
             <div class="col-md-6">
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Imagen :</label>
              <input type="file" class="form-control" id="recipient-name" name="imagen">
            </div>
            </div>
        </div>

         <div class="row">
        <div class="col-md-6">
          <label for="usuario">Descripcion</label>
          <textarea rows="10" cols="42" name="come">
          </textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="Registrar">Agregar Productos</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php  
 require_once 'Vistas/modules/ventas/conexion.php';
 $idusuario = $_GET['idusuario'];
     $consulta = $conexion->query("SELECT * FROM usuarios WHERE idusuario = $idusuario");
?>


<div class="container">
	<ol class="breadcrumb">
	   <li class="breadcrumb-item active"><i class="fa fa-list"> </i>EDITAR USUARIOS </li>
	</ol>
  <div class="row">
     <div class="col-md-7">
     	
	
	      <form method="post">
	      <?php foreach ($consulta as $row => $value): ?>
	      	<input type="hidden" name="idusuario" value="<?php echo $value['idusuario'] ?>">
			  <div class="form-group">
			    <label for="formGroupExampleInput">Nombre Usuario</label>
			    <input type="text" name="nombreusuario" class="form-control" id="formGroupExampleInput" value="<?php echo $value['nombreusuario'] ?>">
			  </div>
			  <div class="form-group">
			    <label for="formGroupExampleInput2">Contraseña Usuario <span>(<i>Si no decea cambiar la contraseña deje el campo como está</i>)</span></label>
			    <input type="password" name="password" class="form-control" id="formGroupExampleInput2"value="<?php echo $value['password'] ?>">
			  </div>
		
			<button type="submit" name="editarUsuario" class="btn btn-primary">Save changes</button>
           </form>
	      <?php endforeach ?>
     </div>

        <div class="col-md-5">
      <!--    <img src="assets/img/foto1.jpg" width="450" height="250">
        --></div>
  </div>
        <br>
</div>

<?php 

$eU = new UsuariosController();
$eU->editarUsuariosController();



 ?>
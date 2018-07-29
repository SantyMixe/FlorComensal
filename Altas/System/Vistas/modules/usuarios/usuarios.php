<div class="container">
	<ol class="breadcrumb">
	   <li class="breadcrumb-item active"><i class="fa fa-list"> </i> LISTADO DE USUARIOS </li>
	</ol>
<?php 

if (isset($_GET['action'])) {
 	if ($_GET['action']== 'okUsuario') {
 	     echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong>El Usuario fue Agregado Satifactoriamente al sistema.
          </div>
        </center>';
 	}

 	if ($_GET['action']== 'okBorrado') {
 	     echo '<center><div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong>El Usuario fue Borrado Satifactoriamente al sistema.
          </div>
        </center>';
 	}

 	if ($_GET['action']== 'okEdiatdoUsuarios') {
 	     echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong>El Usuario fue Editado Satifactoriamente al sistema.
          </div>
        </center>';
 	}
 }


 ?>

		<center>
			<!--  <button class="btn btn-primary" data-toggle="modal" data-target="#usuarios">
			<i class="fa fa-user"> </i> Nuevo Usuario
			 </button> -->
			 <ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="modal" data-target="#usuarios" href="#"><i class="fa fa-user btn btn-outline-info btn-sm"> </i> Nuevo Usuario</a>
				  </li>
				 
			</ul>
	  <br>
 <div class="row">
 	
	<div class="col-md-8">
	<table class="table table-bordered" id="tablaProductos">
		<thead class="bg-primary">
			<tr>
				<td class="usuarios" align="center">ID Usuario</td>
				<td class="usuarios" align="center">Nombre Usuario</td>
				<td class="usuarios" align="center">Correo</td>
				<td class="usuarios" align="center">Fecha Creado</td>
				<td class="usuarios" align="center">Usuario</td>
				<td class="usuarios" align="center">Acciones</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			 $usuarios= new UsuariosController();
			 $usuarios->getUsuariosController();
			 ?>
		</tbody>
	</table>
	</div>
    
    <div class="col-md-4">
	<!--	<img src="assets/img/foto3.jpg" width="330" height="269">-->
    </div>
 </div>
	
	 <?php require 'Vistas/modal/modal_usuarios.php'; ?>
</div>
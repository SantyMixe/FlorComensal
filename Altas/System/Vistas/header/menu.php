
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<?php include "Scrip.php"; ?>
 
  <title>La Flor del Comensal</title>
</head>
<body onload="reloj()">
<?php if ($_SESSION['rol'] == 1):?>
<nav class="navbar navbar-dark bg-warning">
  <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
  <div class="collapse navbar-toggleable-md" id="navbarResponsive">
    <a class="navbar-brand" href="index"><i class="fa fa-" aria-hidden="true"></i> Reservas</a>
    <ul class="nav navbar-nav">
      <li class="nav-item dropdown nav-item active">
        <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-product-" aria-hidden="true"></i> Productos</a>
        <div class="dropdown-menu" id="sub" aria-labelledby="responsiveNavbarDropdown">
          <a id="sub" class="dropdown-item" href="listadoProd"><i class="btn btn-primary btn-sm  fa fa--ol"></i> Listado Productos</a>
        </div>
        
        
      </li>
      <li class="nav-item dropdown nav-item active">
        <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-universal-" aria-hidden="true"></i> Categorías</a>

        <div class="dropdown-menu" id="sub" aria-labelledby="responsiveNavbarDropdown">
          <a id="sub" class="dropdown-item" href="categorias"><i class="btn btn-primary btn-sm  fa fa--ol"></i> Listado Categorias</a>
        
        </div>
      </li> 

        <li class="nav-item dropdown nav-item active">
        <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-" aria-hidden="true"></i> Ventas</a>

        <div class="dropdown-menu" id="sub" aria-labelledby="responsiveNavbarDropdown">
          <a id="sub" class="dropdown-item" href="ventasDiarias"><i class="btn btn-danger btn-sm  fa fa-"></i>Reportes Ventas</a>
        </div>
      </li> 
      
              <li class="nav-item dropdown nav-item active">
        <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-" aria-hidden="true"></i> Mesas</a>

        <div class="dropdown-menu" id="sub" aria-labelledby="responsiveNavbarDropdown">
          <a id="sub" class="dropdown-item" href="principalVentas"><i class="btn btn-primary btn-sm  fa fa--ol"></i> Listado Mesas</a>

        
        </div>
      </li>
      
      <li class="nav-item dropdown nav-item active">
        <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-" aria-hidden="true"></i> usuarios</a>

        <div class="dropdown-menu" id="sub" aria-labelledby="responsiveNavbarDropdown">
          <a id="sub" class="dropdown-item" href="usuarios"><i class="btn btn-primary btn-sm  fa fa--ol"></i> Listado usuario</a>        
        </div>
      </li>
      

          <!-- User =====================================
          ============================================ -->
       <li class="nav-item dropdown  nav-item active float-sm-right">
         <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user  btn-md" aria-hidden="true"></i> Hola ! <?php echo  ' ' .strtoupper($_SESSION[ 'usuario'] .'-'.$_SESSION['rol']);  ?></a>
         <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
          <a class="dropdown-item" href="salir"><i class="btn btn-primary btn-sm fa fa-window-close-o"> </i> Cerrar Sesión</a>
        </div>
      </li> 
      
       <li class=" active float-sm-right">
         <form class="text" name="reloj_javascript">Hora:
		<input type="text" class="reloj"  name="reloj" onfocus="window.document.reloj_javascript.reloj.blur()">
	</form>
         <p class="text"><?php echo "Fecha: " .fechaC(); ?></p>
      </li>
    </ul>
  </div>
</nav>
<?php else: ?>

  <!-- #===============================================================
   Fin
  0===================================================================== -->
<nav class="navbar navbar-dark bg-warning">
  <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
  <div class="collapse navbar-toggleable-md" id="navbarResponsive">
    <a class="navbar-brand" href="index"><i class="fa fa-" aria-hidden="true"></i> Reservas</a>
    <ul class="nav navbar-nav">
      <li class="nav-item dropdown nav-item active">
        <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-product-" aria-hidden="true"></i> Productos</a>
        <div class="dropdown-menu" id="sub" aria-labelledby="responsiveNavbarDropdown">
          <a id="sub" class="dropdown-item" href="listadoProd"><i class="btn btn-primary btn-sm  fa fa--ol"></i> Listado Productos</a>
        
        </div>
      </li>
      <li class="nav-item dropdown nav-item active">
        <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-universal-" aria-hidden="true"></i> Categorías</a>

        <div class="dropdown-menu" id="sub" aria-labelledby="responsiveNavbarDropdown">
          <a id="sub" class="dropdown-item" href="categorias"><i class="btn btn-primary btn-sm  fa fa--ol"></i> Listado Categorias</a>
        
        </div>
      </li> 

        <li class="nav-item dropdown nav-item active">
        <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-" aria-hidden="true"></i> Ventas</a>

        <div class="dropdown-menu" id="sub" aria-labelledby="responsiveNavbarDropdown">
          <a id="sub" class="dropdown-item" href="principalVentas"><i class="btn btn-primary btn-sm  fa fa-list-"></i> Listado Mesas</a>
          <a id="sub" class="dropdown-item" href="ventasDiarias"><i class="btn btn-danger btn-sm  fa fa-"></i>Ventas Diarias</a>
        
        </div>
      </li> 

      <!-- USUARIO NO ADMINISTRADOR -->
      <li class="nav-item dropdown  nav-item active float-sm-right">
         <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user  btn-md" aria-hidden="true"></i> Hola ! <?php echo  ' ' .strtoupper($_SESSION[ 'usuario'] .'-'.$_SESSION['rol']);  ?></a>
         <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
          <a class="dropdown-item" href="salir"><i class="btn btn-primary btn-sm fa fa-window-close-o"> </i> Cerrar Sesión</a>
        </div>
      </li>           
       <li class=" active float-sm-right">
         <form class="text" name="reloj_javascript">Hora:
		<input type="text" class="reloj"  name="reloj" onfocus="window.document.reloj_javascript.reloj.blur()">
	</form>
         <p class="text"><?php echo "Fecha: " .fechaC(); ?></p>
      </li>
      
       
    </ul>
  </div>
</nav>
<?php endif ?>
</body>

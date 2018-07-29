<?php  
    require 'Vistas/modules/ventas/conexion.php';
ob_start();



 $tabla = $_GET['action'];
 // echo $tabla;
 // echo $id;
  if (isset($_GET['idmesa'])) {
       $id = $_GET['idmesa'];
   	 	
   	 	$sql = $conexion->prepare("DELETE FROM $tabla WHERE idmesa = $id");
   	 	$sql->execute();
   	 	 header("location:$tabla");
}
 if (isset($_POST['agregarBebidas'])) {
 	date_default_timezone_set('America/Mexico_City');
 	$fecha = $_POST['fecha'];
 	// echo $fecha;
 	$usu = $_POST['usuario'];
 	$producto = $_POST['producto'];
 	foreach ($producto as $key) {
 		
	list($idproducto,$precio) = explode('-' , $key);
	 
	// echo "id es : ".  $idproducto.'<br>';
	// echo "el precio es:".$precio;
	 
	 $sql = $conexion->prepare("INSERT INTO $tabla (idproducto,precio,fecha ,idusuario)VALUES (:idproducto,:precio,:fecha,:idusuario) ");
	 $sql->execute(array(':idproducto'=>$idproducto,
	 	                 ':precio'=>$precio,
	 	                 ':fecha'=>$fecha,
	 	                 ':idusuario'=>$usu
	                     ));
 	}
 

        header("location:$tabla");
 }

if (isset($_POST['venta'])) {
	 $sql=$conexion->prepare("INSERT INTO detalles (idproducto,precio,fecha,idusuario,mesa)
            SELECT ta.idproducto,ta.precio,ta.fecha,ta.idusuario,ta.mesa
            FROM $tabla ta ");
           $sql->execute();
            $sql = $conexion->prepare("DELETE FROM $tabla");
            $sql->execute();
            header("location:$tabla");
}

 ?>

<div class="container" style="overflow: auto; width: 720px; height: 400px;">

	<center><h1><i class="fa fa-table" aria-hidden="true"> </i> <?php echo $tabla; ?></h1>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bebidas" data-whatever="@mdo"><i class="fa fa-plus-square"> </i> ADICIONAR PEDIDOS </button></center>
	
  <?php require 'Vistas/modal/modal_agregar_productos.php'; ?>


  <?php   $consult = $conexion->query("SELECT * FROM $tabla ta JOIN productos pro ON ta.idproducto = pro.idproducto  ");  ?>
  
  	<table class="table table-bordered" id="imprimeme">
	  <thead>
	    <tr>
	      <th>ID</th>
	      <th>ID PRODUCTO</th>
	      <th>NOMBRE PRODUCTO</th>
	      <th>PRECIO</th>
	    </tr>
	  </thead>
	  <tbody>

  <?php foreach ($consult as $key): ?>
	    <tr>  
	      <th scope="row"><?php echo $key['idmesa'] ?></th>
	      <td><?php echo $key['idproducto'] ?></td>
	      <td><?php echo $key['nombreproducto'] ?></td>
	      <td><i class="fa fa-usd"> </i> <?php echo $key['precio'] ?> <a href="index.php?action=<?php echo $tabla ?>&idmesa=<?php echo $key['idmesa']  ?>" class="pull-right" ><i class="fa fa-trash-o btn btn-danger btn-sm"></i></a> </td>
	    </tr>
	    
  <?php endforeach ?>
	    <tr>
	      <th scope="row"><i class="fa fa-usd fa-price fa-2x"></i></th>
	      <td colspan="2">SUB TOTAL</td>
	      <?php  $total = $conexion->prepare("SELECT  SUM(PRECIO) AS TOTAL FROM $tabla");
	        $total->execute();
		 foreach ($total as $key) {
		   $result = $key['TOTAL'];
          } ?>
	      <td><i class="fa fa-usd"></i> <?php echo $result; ?></td>
	    </tr>
	  </tbody>
</table>


<?php 

  $sql=$conexion->prepare("SELECT * FROM $tabla,usuarios ");
  $sql->execute();
   ?>
		<form method="post">
		 <?php foreach ($sql as $key) :?>
			<input type="hidden" name="fecha[]" value="<?php echo date("Y-m-d"); ?>">
			<input type="hidden" name="idproducto[]" value="<?php echo $key['idproducto'] ?>">
			<input type="hidden" name="precio[]" value="<?php echo $key['precio'] ?>">
			<input type="hidden" name="idusuario[]" value="<?php echo $key['idusuario'] ?>">
		  <?php endforeach; ?>  
		   <input type="submit" class="btn btn-danger" name="venta" value="$ Finalizar Venta">
		</form>

  
</div>
<script>
	function imprimir(){
  var objeto=document.getElementById('imprimeme');  //obtenemos el objeto a imprimir
  var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
  ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
  ventana.document.close();  //cerramos el documento
  ventana.print();  //imprimimos la ventana
  ventana.close();  //cerramos la ventana
}
</script>
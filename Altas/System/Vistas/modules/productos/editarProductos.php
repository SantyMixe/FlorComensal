<?php  
 require_once 'Vistas/modules/ventas/conexion.php';
 $idproducto = $_GET['idproducto'];
     $consulta = $conexion->query("SELECT * FROM productos pro JOIN categorias cat ON cat.idcategoria = pro.idcategoria WHERE idproducto = $idproducto");
?>

<div class="container">
	
  <ol class="breadcrumb">
     <li class="breadcrumb-item active"><i class="fa fa-list"> </i> EDITAR USUARIOS </li>
  </ol>
 <form method="post">
 <?php foreach ($consulta as $key ): ?>
    <input type="hidden" name="idproducto" value="<?php echo $key['idproducto']; ?>">
 	   
          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nombre Producto:</label>
                <input type="text" class="form-control" id="recipient-name" name="nombreproducto" value="<?php echo $key['nombreproducto'] ?>">
              </div>
            </div>
               <div class="col-md-6">  
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Categoria Producto:</label>
      <select class="form-control chosen-select" id="idcategoria" name="idcategoria">     
           <option value="<?php echo $key['idcategoria'] ?>" ><?php echo ucwords($key['nombrecategoria']) ?>
           </option>
              <?php   $cons = $conexion->query("SELECT * FROM categorias "); ?>
            <?php foreach ($cons as $row ): ?>
            	<option value="<?php echo $row['idcategoria']; ?>">
            		<?php echo ucwords($row['nombrecategoria']); ?>
            	</option>
            <?php endforeach ?>
    </select>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6"> 
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Precio Producto :</label>
              <input type="text" class="form-control" id="recipient-name" name="precio" required="" value="<?php echo $key['precio']   ?>">
            </div>
            </div>
            <div class="col-md-6"> 
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Usuario del Sistema:</label>
              <input type="text" class="form-control" id="recipient-name"   value="<?php echo strtoupper($_SESSION['nombreusuario']); ?>" readonly="">
            </div>
          
            </div>
            <?php   $cons = $conexion->query("SELECT * FROM usuarios "); ?>
            <?php foreach ($cons as $key ): ?>
              
            <input type="hidden" name="idusuario" value="<?php echo $key['idusuario']; ?>">
            <?php endforeach ?>
        </div>
       
         <CENTER>
            <button type="submit" class="btn btn-primary" name="editarProductos">Agregar Productos</button>
         </CENTER>
         <br>
       </form>
 <?php endforeach ?>
</div>

<?php 

$editarProductos = new ProductosController();
$editarProductos->actualizarProductosController();

 ?>
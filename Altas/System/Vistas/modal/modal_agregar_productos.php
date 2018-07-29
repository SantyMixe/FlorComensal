
<div class="modal fade" id="bebidas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar a las Mesas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
        <div class="row">  
        <div class="col-md-6">
         <?php  $consul = $conexion->query("SELECT * FROM usuarios");  ?>

            <?php foreach ($consul as $key): ?>
              <input type="hidden" name="usuario" value="<?php echo $key['idusuario'] ?>">
            <?php endforeach ?>
             <?php             
            $consul = $conexion->query("SELECT * FROM productos pro JOIN categorias cat ON pro.idcategoria = cat.idcategoria WHERE nombrecategoria= 'BEBIDAS'  order by nombreproducto asc");      
            ?>
          <select class="form-control chosen-select" id="idcategoria" name="producto[]">
           <option value=""  required="" >SELECCIONA UNA BEBIDA</option> 
                <?php foreach ($consul as $fila): ?>
             <option value="<?php echo $fila['idproducto']. '-' .  $fila['precio'] ?>"> <?php echo ucwords($fila['nombreproducto'])?> 
            </option>

              <?php endforeach ?>
        </select>
        </div>
<br>
     <div class="col-md-6">
             <?php             
            $consul = $conexion->query("SELECT * FROM productos pro JOIN categorias cat ON pro.idcategoria = cat.idcategoria WHERE nombrecategoria= 'CARNE'  order by nombreproducto asc");      
            ?>
          <select class="form-control chosen-select" id="idcategoria" name="producto[]">
           <option value="0"  required="" >SELECCIONA PLATO DE CARNE</option> 
                <?php foreach ($consul as $fila): ?>
             <option value="<?php echo $fila['idproducto']. '-' .  $fila['precio'] ?>"> <?php echo ucwords($fila['nombreproducto'])?> 
            </option>
              <?php endforeach ?>
        </select>
      </div>
           <div class="col-md-6">
<br><br>
     <?php             
            $consul = $conexion->query("SELECT * FROM productos pro JOIN categorias cat ON pro.idcategoria = cat.idcategoria WHERE nombrecategoria= 'POSTRES'  order by nombreproducto asc");      
            ?>
          <select class="form-control chosen-select" id="idcategoria" name="producto[]">
           <option value="0"  required="" >SELECCIONA UN POSTRE</option> 
                <?php foreach ($consul as $fila): ?>
             <option value="<?php echo $fila['idproducto']. '-' .  $fila['precio'] ?>"> <?php echo ucwords($fila['nombreproducto'])?> 
            </option>
              <?php endforeach ?>
        </select>
        </div>
        <div class="col-md-6">
        <br><br>
     <?php             
            $consul = $conexion->query("SELECT * FROM productos pro JOIN categorias cat ON pro.idcategoria = cat.idcategoria WHERE nombrecategoria= 'VERDULERIAS'  order by nombreproducto asc");      
            ?>
          <select class="form-control chosen-select" id="idcategoria" name="producto[]" required="">
           <option value="0"  required="" >SELECCIONA ENSALADAS</option> 
                <?php foreach ($consul as $fila): ?>
             <option value="<?php echo $fila['idproducto']. '-' .  $fila['precio'] ?>"> <?php echo ucwords($fila['nombreproducto'])?> 
            </option>
              <?php endforeach ?>
        </select>
        </div>
         <div class="col-md-6">
        <br><br>
     <?php             
            $consul = $conexion->query("SELECT * FROM productos pro JOIN categorias cat ON pro.idcategoria = cat.idcategoria WHERE nombrecategoria= 'SERVICIO DE MESA'  order by nombreproducto asc");      
            ?>
          <select class="form-control chosen-select" id="idcategoria" name="producto[]">
           <option value="0"  required="" >SERVICIOS DE MESAS</option> 
                <?php foreach ($consul as $fila): ?>
             <option value="<?php echo $fila['idproducto']. '-' .  $fila['precio'] ?>"> <?php echo ucwords($fila['nombreproducto'])?> 
            </option>
              <?php endforeach ?>
        </select>
        </div>
       
      </div>
       


         <input type="hidden" name="fecha" value="<?php echo  date('d-m-Y') ?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="agregarBebidas" id="agregarBebidas" class="btn btn-primary">Agregar</button>
      </div>
     </form>
    </div>
  </div>
</div>
 </div>
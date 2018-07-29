<div class="container">
<?php 
   
   require 'Vistas/modules/ventas/conexion.php';

   if (isset($_POST['reporteVenta'])) {
        date_default_timezone_set('America/Mexico_City');
     $fechaInicial = date('d-m-Y' , strtotime( $_POST['fechaInicial']));
     $fechaFinal   = date('d-m-Y' , strtotime($_POST['fechaFinal']));


    $sql = $conexion->prepare('SELECT * ,SUM(PRECIO) AS "TOTAL" , COUNT(idproducto) AS "PROD"  FROM detalles det JOIN usuarios us ON us.idusuario = det.idusuario
             WHERE fecha BETWEEN  "'.$fechaInicial.'" AND "'.$fechaFinal.'" ');

    $sql->execute();
    $respuesta = $sql->fetchAll();
    // var_dump($respuesta);
   }
 error_reporting(E_ERROR  | E_PARSE);
 ?>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active"><i class="fa fa-list"> </i> VENTAS DIARIAS</li>
   </ol>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link " id="uno" data-toggle="tab" href="#home" role="tab">Consulatr Por Fechas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="dos" data-toggle="tab" href="#profile" role="tab">Consultar Por Mesas</a>
  </li>
</ul>
<br>
<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel">
     
<div id="formulario">
    
    <form method="post">

    <div class="row">
        <div class="col-md-6">
           <i class="fa fa-calendar"> </i> Fecha Inicial :
            <input type="date" name="fechaInicial" id="" class="form-control" required="">
        </div>

        <div class="col-md-6">
           <i class="fa fa-calendar"> </i> Fecha Final : 
            <input type="date" name="fechaFinal" id="" class="form-control" required="">
        </div>
<br><br><br><br>
        <div class="col-lg-10">
            <center>
                <input type="submit" name="reporteVenta" value="Consultar" class="btn btn-outline-primary" id="consulta">
            </center>
        </div>
    </div>

        
    </form>
</div>
  </div>
  <div class="tab-pane" id="profile" role="tabpanel">

    

  </div>
  
</div>
<center>
    
<?php  if ($fechaInicial > $fechaFinal) :
      echo "<h3>Error En La selección de las Fechas</h3>";
    ?>
    <br>
      
<?php else : ?>
            <?php foreach ($respuesta as $key ): ?>
 <?php 
  echo "<h3>El Rango de Busqueda es: " .$fechaInicial ." Hasta: " .$fechaFinal. '</h3>';
 
 ?> 
            <div class="col-md-6">
               <table class="table table-bordered">
                 <thead class="bg-danger">
                     <tr>
                         <td class="td" align="center"> TOTAL DE VENTAS </td>
                         <td class="td" align="center"> CANTIDAD DE PRODUCTOS  </td>
                         <td class="td" align="center"> USUARIO DEL SISTEMA  </td>
                     </tr>
                 </thead>
                     
                    <tbody>
                        <td class="reportes" align="center"><i class="fa fa-usd"> </i>
                         <?php if($key['TOTAL'] == ''){
                             echo "<h4> No se Encontraron Datos en Las Fechas Seleccionadas </h4>";
                            }else{
                                 echo $key['TOTAL'] ;
                                } ?> </td>
                         <td class="reportes" align="center"><i class="fa fa-underline"> </i> <?php echo "  " . $key['PROD'] ?>  </td>
                          <td class="reportes" align="center"> <?php echo "  " . $key['nombreusuario'] ?>  </td>
                    </tbody>
                   <button class="btn btn-info" onclick="print();">IMPRIMIR</button><br><br>
                 <?php endforeach ?>
             <?php endif ; ?>
                </table>
           </div>
</center>
</div>


<script>

$(document).ready(function(){
    $("#uno").addClass("active");
  $("#uno").click(function(){
    $("#uno").addClass("active");
    $('#dos').removeClass('active');
  });
  $("#dos").click(function(){
    $("#dos").addClass("active");
      $('#uno').removeClass('active');
  });
  
});
</script>

<script>
 $(document).ready(function(){
    $('#consulta').click( function(){
           $('#formulario').hide('slow'); 
    })
 }())
</script>

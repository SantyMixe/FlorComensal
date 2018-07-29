<div class="container">
	
<?php
 require_once 'Vistas/modules/ventas/conexion.php'; 
 require_once("dompdf/dompdf_config.inc.php");
ob_start();

 $tabla = $_GET['tabla'];
echo $tabla;
// $sql = $conexion->prepare("SELECT * FROM $tabla");
// $sql->execute();

 $codigoHTML='
<div align="center">
    <table width="95%" border="1">
      <tr>
        <td bgcolor="#0099FF"><strong>Nit</strong></td>
        <td bgcolor="#0099FF"><strong>Nombre</strong></td>
        <td bgcolor="#0099FF"><strong>Direccion</strong></td>
        <td bgcolor="#0099FF"><strong>Correo</strong></td>
      </tr>';

        $consulta=$conexion->query("SELECT * FROM $tabla");
     foreach ($consulta as $dato ) {
$codigoHTML.='
      <tr>
        <td>'.$dato['idmesa'].'</td>
        <td>'.$dato['precio'].'</td>
        <td>'.$dato['fecha'].'</td>
        <td>'.$dato['idusuario'].'</td>
      </tr>';
      } 
 $codigoHTML.='
    </table>
	
</div>';

 $codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Factura.pdf");

 ?>
</div>

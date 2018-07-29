<?php 	
session_start();
include('conexion.php');

$producto = $_SESSION['shopping_cart'];

//var_dump($producto);

foreach ($producto as $key => $value) {

	$nombre = $value["nombre"];
	$cantidad = $value["cantidad"];
	$precio= $value["precio"];
	$total = $value["precio"] * $value["cantidad"];
	
	//var_dump($value['cantidad']);
	$sql = "INSERT INTO pedido (idpedido,nombre,cantidad,precio,total) VALUES(null,'$nombre','$cantidad','$precio','$total')";

	//echo $sql;
	$ins = $con->query($sql);
		# code...
}

	/*if ($ins) {
	echo"si";

	}else{
		echo "no";
	}*/
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

 	<title>Document</title>

	

</head>

 </head>
 <body>
 <div class="container-fluid">
    <div class="row  justify-content-center">

      <div class="col-md-4 mt-5">
        <div class="card text-center">
          <img class="card-img-top" src="img/logo.png" alt="Card image cap">
        <div class="card-body">
          <h3 class="card-title">Registro de la orden</h3>
          <hr>
        
                 
                <table class="table  text-center">
                    <thead>
                        <tr>
                            <th class="text-center">NOMBRE  </th>
                            <th class="text-center">TOTAL</th>
                        </tr>
                        <?php   
        if(!empty($_SESSION['shopping_cart'])):  
            
             $total = 0;  
        
             foreach($_SESSION['shopping_cart'] as $key => $product): 
        ?>  
         <tr>  
           <td>  
            <?php echo $product['nombre']; ?>
             </td> 

          
            
           <td class="text-center">
            $ <?php echo number_format($product['cantidad'] * $product['precio'], 2); ?>
           </td>  
         
        </tr>  <?php  
                  $total = $total + ($product['cantidad'] * $product['precio']);  
             endforeach;  
        ?>  
        <tr>  
             <td colspan="3" align="right"></td>  
             <td align="pull-right">
             <h4>total</h4>
              $<?php   echo number_format($total, 2); ?>
             </td>  
             <td>
              
             </td>  


        </tr>


        <tr>
           

            <td colspan="5">
             <?php 
                if (isset($_SESSION['shopping_cart'])):
                if (count($_SESSION['shopping_cart']) > 0):

             ?>

             
             <a href="salir.php"  class="button" id="btn-en">
                <img src="img/bk.png" width="60" height="60" alt="Enviar Pedido">
            </a>
              
             
       
             <?php endif; endif; ?>
            </td>
        </tr>
        <?php  
        endif;
        ?>  

                        
                    </thead>
                </table>
      
        </div>
        
      </div>
    </div>
   
   
  </div>
</div>
 

    
	
 </body>
 </html>

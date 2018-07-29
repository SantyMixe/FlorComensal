<?php

session_start();
//session_destroy();
$product_ids = array();
//session_destroy();


if(filter_input(INPUT_POST, 'add_to_cart')){
    if(isset($_SESSION['shopping_cart'])){

     
        $count = count($_SESSION['shopping_cart']);

        $product_ids = array_column($_SESSION['shopping_cart'], 'id');

        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
        $_SESSION['shopping_cart'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'nombre' => filter_input(INPUT_POST, 'nombre'),
                'precio' => filter_input(INPUT_POST, 'precio'),
                'cantidad' => filter_input(INPUT_POST, 'cantidad')
            );
        }
        else { 
       
            for ($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                 
                    $_SESSION['shopping_cart'][$i]['cantidad'] += filter_input(INPUT_POST, 'cantidad');
                }
            }
        }

    }
    else { 
        $_SESSION['shopping_cart'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'nombre' => filter_input(INPUT_POST, 'nombre'),
            'precio' => filter_input(INPUT_POST, 'precio'),
            'cantidad' => filter_input(INPUT_POST, 'cantidad')
        );
    }
}

if(filter_input(INPUT_GET, 'action') == 'delete'){
  
    foreach($_SESSION['shopping_cart'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')){
            
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}


function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
 ?>
 <!DOCTYPE html>
<html>
    <head>
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/estilos.css">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>
    <body>
       <div class="container">

        <?php


        $connect = mysqli_connect('localhost', 'root', 'tlahuitoltepec', 'comensal');
        $query = 'SELECT * FROM platillos ORDER by id ASC';

        $result = mysqli_query($connect, $query);


        if ($result):
            if(mysqli_num_rows($result)>0):
                while($product = mysqli_fetch_assoc($result)):
                //print_r($product);
                ?>
                <div class="col-md-4 mt-5">

                        <div class="card text-center">
              <img src="data:image/jpg;base64,<?php echo base64_encode($product['imagen']); ?>" class="img-responsive"/>
        <div class="card-body">

            <h4 class="text-capitalize"><?php echo $product['nombre']; ?></h4>
          <hr>
          <h5>Descripcion</h5>
          <?php
          echo $product['descripcion'];
           ?>
          <p>
            <button type="" class="btn btn-outline" id="precio">  $ <?php echo $product['precio']; ?>
             </button>
             <!--<form method="post" action="platillo.php?action=add&id=<?php echo $product['id']; ?>">-->
                    <form method="post" action="platillo.php?id=<?php echo $product['id']; ?>">
                        <div class="productos">

                        
                            <div class="col-4" id="columnas">
                        

                            <input id="can"  type="number" name="cantidad" class="form-control text-center" min="1" max="10" pattern="^[0-9]+"/>

        

                            <input type="hidden" name="nombre" value="<?php echo $product['nombre']; ?>" />
                            <input type="hidden" name="precio" value="<?php echo $product['precio']; ?>" />
                          <input id="guardar" type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success"
                                   value="Enviar" />
                        </div>
                         </div>
                    </form>
                </div>
                </div>
                </div>
                <?php
                endwhile;
            endif;
        endif;
        ?>
        <div style="clear:both"></div>
        <br />

        </div>


        <div class="container" id="hola">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Menu</h3>
                        <div class="pull-right">

                        </div>
                    </div>
                   <form action="guardar.php" method="post">

                    <table class="table table-hover text-center" id="dev-table">
                        <thead>
                            <tr>
                                <th width="40%">NOMBRE  </th>
                                <th width="10%">CANTIDAD</th>
                                <th width="20%">PRECIO</th>
                                <th width="15%">TOTAL</th>

                                <th class="text-center" width="5%"><img src="img/remove.png"></th>

                            </tr>
                              <?php
        if(!empty($_SESSION['shopping_cart'])):

             $total = 0;

             foreach($_SESSION['shopping_cart'] as $key => $product):
        ?>
        <tr>
           <td>
            <input style="border:none" name="producto['nombre']" class="form-control text-center" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $product['nombre']; ?>">
             </td>

           <td>
             <input style="border:none"  name="producto['cantidad']" class="form-control text-center" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php   echo $product['cantidad']; ?>">
           </td>
           <td>
            <input style="border:none"  name="producto['precio']" class="form-control text-center" aria-label="Small" aria-describedby="inputGroup-sizing-sm" readonly value=" $ <?php echo $product['precio']; ?>">

           </td>
           <td>
            <input style="border:none"  class="form-control text-center" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value=" $ <?php echo number_format($product['cantidad'] * $product['precio'], 2); ?>">
           </td>
           <td>
           <!-- <a id="eliminar" href="platillo.php?action=delete&id=<?php echo $product['id']; ?>">-->
            <a id="eliminar"  href="platillo.php?action=delete&id=<?php echo $product['id']; ?>"><img src="img/eliminar.svg" width="20" height="20"></a>

           </td>
        </tr>

        <?php
                  $total = $total + ($product['cantidad'] * $product['precio']);
             endforeach;
        ?>
        <tr>
             <td colspan="3" align="right"></td>
             <td align="pull-right">
             <h4>total</h4>
             <input style="border:none" type="text" name="producto['total']" class="form-control text-center" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value=" $<?php   echo number_format($total, 2); ?> ">
             </td>
             <td>

             </td>


        </tr>


        <tr>
            <!-- Show checkout button only if the shopping cart is not empty -->
            <td colspan="5">
             <?php
                if (isset($_SESSION['shopping_cart'])):
                if (count($_SESSION['shopping_cart']) > 0):

             ?>

             <input type="submit" id="eli">
             



             <?php endif; endif; ?>
            </td>
        </tr>
        <?php
        endif;
        ?>


                        </thead>

                    </table>
                    </form>



                </div>
            </div>

        </div>
    </div>




    </body>
    <script>

    /*$(document).ready(function(){
        $("#eli").click(function(){

             var trs=$("#dev-table tr").length;
            if(trs>1)
            {
                // Eliminamos la ultima columna
                $("#dev-table tr").remove();

            }

        });
    });¨/
    </script>



</html>

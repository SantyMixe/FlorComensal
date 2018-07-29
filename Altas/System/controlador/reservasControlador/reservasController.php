<?php  
ob_start();

class MvcController {

   public function plantilla(){
   	     include 'Vistas/template.php';
   }

  	#INTERACCIÓN DEL USUARIO
	#----------------------------------------------
	public function enlacesPaginasController(){

		if(isset($_GET["action"])){

		  $enlacesController = $_GET["action"];

		}else{

		   $enlacesController = "index";
			
		}
      // le pide al modelo y que conecte con :: al método y asi heredo la clase y sus metodos y atributos..
		 $respuesta = Paginas::enlacesPaginasModel($enlacesController);
		 require $respuesta;

	}
	//=============================================================================
	//RESERVAS
	//============================================================================
// funcion para devolver todas las reservas.
	 	public function getReservasController(){

	 		date_default_timezone_set('America/Mexico_City');
	 		$hoy = date('Y-m-d');
 		$respuesta = Datos::getReservasModel('reservas');
 			# code...
 		foreach ($respuesta as $row) {
 			if ($hoy == $row['diallegada']) {
	 			echo '<tr>			
					<td align="center"> '.$row["nombrecliente"].'</a></td>
					<td align="center"> '.$row["cantidadpersonas"].'</td>
					<td align="center">'.$row["telefono"].'</td> 
				  <td align="center">'.date("d-m-Y", strtotime($row["diallegada"])).'</td>
					<td align="center">'.$row["horallegada"].'</td>
					<td align="center">'.$row["observaciones"].'</td>		
					<td align="center"><a href="index.php?action=editarReservas&idreserva='.$row["idreserva"].'"<i class="fa fa-edit btn btn-primary btn-sm"></i></a>&nbsp;&nbsp;&nbsp;
					    <a href="index.php?action=reservas&idBorrar='.$row["idreserva"].'"<i class="fa fa-trash-o btn btn-danger btn-sm"></i></a>
					</td>
				    </tr>';
 			}
 		}
 		}
 	//insertar reservas
 	public function agregarReservaController(){
         	if(isset($_POST['agregar'])) {
 			$datosController = array("nombrecliente"=>$_POST['nombrecliente'],
 				                     "cantidadpersonas"=>$_POST['cantidadpersonas'],
 				                      "telefono"=>$_POST['telefono'],
 				                      "diallegada"=>$_POST['diallegada'],	              
 				                      "horallegada"=>$_POST['horallegada'],	              
 				                      "observaciones"=>$_POST['observaciones']
 				                                  
 				                     );
 			#pedir la informacion al modelo.
 		
 		$respuesta= Datos::agregarReservasModel($datosController,'reservas');
 			if ($respuesta == 'success') {
 				header('location:okReservas');
 			}else{
                header('location:reservas');
 			}
 		}
 	}

 	//borrar Reservas
   public function deleteReservasController(){
   	 if (isset($_GET['idBorrar'])) {
   	 	$datosController = $_GET['idBorrar'];

   	 	$respuesta = Datos::deleteReservaModel($datosController,'reservas');
   	 	if ($respuesta == 'success') {
         header('location:borrarReservas');
          
   	 	}
   	 }
   }
//cantidad de reservas
   public function totalReservasController(){
   	  $respuesta = Datos::totalReservasModel('reservas');
   	 	foreach ($respuesta as $key ) {
 			 echo $key['total'];
 		}
   	  	
   	  
   }

     public function editarReservasController(){
      	$datosController= $_GET['idreserva'];
	    $respuesta =Datos::editarReservasModel($datosController, 'reservas');

	    echo ' <form method="post">
          <div class="row">
            <div class="col-md-6">  
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nombre Cliente:</label>
                <input type="text" class="form-control" id="recipient-name" name="nombrecliente" value="'.$respuesta['nombrecliente'].'">
              </div>
            </div>
               <div class="col-md-6">  
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Cantidad de Personas:</label>
              <input type="text" class="form-control" id="recipient-name" name="cantidadpersonas" value="'.$respuesta['cantidadpersonas'].'">
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6"> 
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Telefono de Contacto:</label>
              <input type="text" class="form-control" id="recipient-name" name="telefono"  value="'.$respuesta['telefono'].'">
            </div>
            </div>
            <div class="col-md-6"> 
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Fecha Reserva (1/10/2017):</label>
              <input type="text" id="datepicker" class="form-control" id="recipient-name" name="diallegada" value="'.$respuesta['diallegada'].'">
            </div>
            </div>
            </div>
             <div class="row">
                <div class="col-md-6"> 
             <div class="form-group">
              <label for="recipient-name" class="form-control-label">Hora de Reserva (22:00):</label>
              <input type="text" class="form-control" id="recipient-name" name="horallegada" value="'.$respuesta['horallegada'].'">
            </div>
            </div>
              <div class="col-md-6"> 
              <div class="form-group">
              <label for="message-text" class="form-control-label">Observaciones:</label>
              <textarea class="form-control" id="message-text" name="observaciones" required="">'.$respuesta['observaciones'].'</textarea>
            </div>
            </div>
        </div>
        </div>
        <input type="hidden" name="idreserva" value="'.$respuesta['idreserva'].'">
          <button type="submit" class="btn btn-primary form-control" name="editar">Agregar Reserva</button>
          </form>';
     
    }

    public function actualizarReservasController(){
    	if (isset($_POST['editar'])) {
    		$datosController=array('nombrecliente'=>$_POST['nombrecliente'],
    			                   'cantidadpersonas'=>$_POST['cantidadpersonas'],
    			                   'telefono'=>$_POST['telefono'],
    			                   'diallegada'=>date("Y-m-d", strtotime($_POST['diallegada'])),
    			                   'horallegada'=>$_POST['horallegada'],
    			                   'observaciones'=>$_POST['observaciones'],
    			                   'idreserva'=>$_POST['idreserva']
    			);
    	$respuesta=Datos::actualizarReservasModel($datosController,'reservas');	
    	  	if ($respuesta == 'success') {
      				  header('location:cambioReservas');
      		}
    	}
    }
   //=============================================================================
	//FIN DE RESERVAS
	//============================================================================

}

<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){
		// =============================================================
		// enlacesde ventas
		// =============================================================

		if(  $enlaces == "principalVentas"  || $enlaces=='buscar'){

			$module =  "Vistas/modules/ventas/".$enlaces.".php";
		
		}

		else if($enlaces == "mesa1"){

			$module =  "Vistas/modules/ventas/principalVentas.php";
		}
        else if($enlaces == "mesa2"){

			$module =  "Vistas/modules/ventas/principalVentas.php";
		
		}
		  else if($enlaces == "mesa3"){

			$module =  "Vistas/modules/ventas/principalVentas.php";
		
		}
		  else if($enlaces == "mesa4"){

			$module =  "Vistas/modules/ventas/principalVentas.php";
		
		}
		  else if($enlaces == "mesa5"){

			$module =  "Vistas/modules/ventas/principalVentas.php";
		
		}
		  else if($enlaces == "mesa6"){

			$module =  "Vistas/modules/ventas/principalVentas.php";
		
		}
		  else if($enlaces == "mesa7"){

			$module =  "Vistas/modules/ventas/principalVentas.php";
		
		}
		  else if($enlaces == "mesa8"){

			$module =  "Vistas/modules/ventas/principalVentas.php";
		
		}
		  else if($enlaces == "mesa9"){

			$module =  "Vistas/modules/ventas/principalVentas.php";
		
		}
		  else if($enlaces == "mesa10"){

			$module =  "Vistas/modules/ventas/principalVentas.php";
		
		}

		 else if($enlaces == "ventasDiarias"){

			$module =  "Vistas/modules/ventas/ventasDiarias/ventasDiarias.php";
		
		}

		 else if($enlaces == "imprimir"){

			$module =  "Vistas/modules/ventas/imprimir.php";
		
		}






	 // =============================================================
    // enlaces del las login
   // =====================================================

		
		else if($enlaces == "ingresar"){

			$module =  "Vistas/login/login.php";
		
		}
  

    // =============================================================
    // enlaces del las reservas
   // =====================================================

		else if($enlaces == "reservas" || $enlaces == "index" ){

			$module =  "Vistas/reservas/reservas.php";
		
		}

		else if($enlaces == "okReservas" ){

			$module =  "Vistas/reservas/reservas.php";
		
		}


		else if($enlaces == "borrarReservas" ){

			$module =  "Vistas/reservas/reservas.php";
		
		}

		else if($enlaces == "buscarReservas" ){

			$module =  "Vistas/reservas/buscarReservas.php";
		
		}

		else if($enlaces == "editarReservas" ){

			$module =  "Vistas/reservas/editarReservas.php";
		
		}
     
       else if($enlaces == "cambioReservas" ){

			$module =  "Vistas/reservas/Reservas.php";
		
		}


		

	


    // =============================================================
    // enlaces del las usuario
   // =====================================================

		else if($enlaces == "salir"){

			$module =  "Vistas/modules/usuarios/salir.php";
		
		}

		else if($enlaces == "usuarios"){

			$module =  "Vistas/modules/usuarios/usuarios.php";
		
		}

		else if($enlaces == "okUsuario"){

			$module =  "Vistas/modules/usuarios/usuarios.php";
		
		}

		else if($enlaces == "okBorrado"){

			$module =  "Vistas/modules/usuarios/usuarios.php";
		
		}

			else if($enlaces == "editarUsuarios"){

			$module =  "Vistas/modules/usuarios/editarUsuarios.php";
		
		}

			else if($enlaces == "okEdiatdoUsuarios"){

			$module =  "Vistas/modules/usuarios/usuarios.php";
		
		}



    // =============================================================
    // enlaces del los Productos
   // =====================================================

		else if($enlaces == "listadoProd"){

			$module =  "Vistas/modules/productos/listadoProd.php";
		
		}
        
        else if($enlaces == "platillo"){

			$module =  "Vistas/header/modal_platillos.php";
		
		}

       else if($enlaces == "okProductos"){

			$module =  "Vistas/modules/productos/listadoProd.php";
		
		}


       else if($enlaces == "borrarProductos"){

			$module =  "Vistas/modules/productos/listadoProd.php";
		
		}

       else if($enlaces == "editarProductos"){

			$module =  "Vistas/modules/productos/editarProductos.php";
		
		}
		else if($enlaces == "okEditar"){
			$module =  "Vistas/modules/productos/listadoProd.php";
		}
		




    // =============================================================
    // enlaces del las CATEGORIAS
   // =====================================================

		else if($enlaces == "categorias"){

			$module =  "Vistas/modules/categorias/categorias.php";
		
		}

		else if($enlaces == "okCategorias"){

			$module =  "Vistas/modules/categorias/categorias.php";
		
		}


		else if($enlaces == "borrarCat"){

			$module =  "Vistas/modules/categorias/borrarCategorias.php";
		
		}

		else if($enlaces == "editarcategoria"){

			$module =  "Vistas/modules/categorias/editarCategorias.php";
		
		}
		else if($enlaces == "okEdit"){

			$module =  "Vistas/modules/categorias/categorias.php";
		
		}
		
		else if($enlaces == "borrarCategorias"){

			$module =  "Vistas/modules/categorias/categorias.php";
		
		}
		

 


		else{

			$module =  "Vistas/reservas/reservas.php";

		}
        
        
        #--------------------------------------------------------
	#enlaces de la aplicacion 
    

		
		return $module;

	}
	
    
    
    

}










 ?>
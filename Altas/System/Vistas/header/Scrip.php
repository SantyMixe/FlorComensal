<?php 
	date_default_timezone_set('America/Mexico_City'); 
	
	function fechaC(){
		$mes = array("","Enero", 
					  "Febrero", 
					  "Marzo", 
					  "Abril", 
					  "Mayo", 
					  "Junio", 
					  "Julio", 
					  "Agosto", 
					  "Septiembre", 
					  "Octubre", 
					  "Noviembre", 
					  "Diciembre");
		return date('d')." de ". $mes[date('n')] . " de " . date('Y');
	}


 ?> 
  
   
    
     
       <link rel="stylesheet" href="assets/css/bootstrap.css"> 
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="assets/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="assets/css/estilos.css"> 
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/chosen/chosen.min.css">




<script src="assets/js/lib/jquery.js"></script>
<script src="assets/js/lib/jquery.dataTables.js"></script>
<script src="assets/js/lib/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/dataTables.responsive.min.js"></script>
<script src="assets/js/lib/responsive.bootstrap.min.js"></script>
<script src="assets/js/lib/jquery-ui.min.js"></script>
<script src="assets/chosen/chosen.jquery.min.js"></script>  
<script src="assets/js/chosen.js"></script>  
<script src="assets/js/lib/bootstrap.js"></script>  
<script src="assets/js/lib/menu.js"></script>  
<script src="assets/js/calendario.js"></script>  
 	<script>
		function reloj() {
			//Variables
			horareal = new Date()
			hora = horareal.getHours()
			minuto = horareal.getMinutes()
			segundo = horareal.getSeconds()
			//Codigo para evitar que solo se vea un numero en los segundos
			comprobarsegundo = new String (segundo)
			if (comprobarsegundo.length == 1)
			segundo = "0" + segundo
			//Codigo para evitar que solo se vea un numero en los minutos
			comprobarminuto = new String (minuto)
			if (comprobarminuto.length == 1)
			minuto = "0" + minuto
			//Codigo para evitar que solo se vea un numero en las horas
			comprobarhora = new String (hora)
			if (comprobarhora.length == 1)
			hora = "0" + hora
			// Codigo para mostrar el reloj en pantalla
			verhora = hora + " : " + minuto + " : " + segundo
			document.reloj_javascript.reloj.value = verhora
			setTimeout("reloj()",1000)
		}
	</script>
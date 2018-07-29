<?php 
 $conexion = new PDO('mysql:host=localhost;dbname=rest','root','tlahuitoltepec');
   date_default_timezone_set('America/Mexico_City');
 $conexion->exec('SET CHARACTER SET utf8');

 ?>
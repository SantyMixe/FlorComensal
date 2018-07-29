<?php
$host     = 'localhost';
$user     = 'root';
$password = 'tlahuitoltepec';
$db       = 'laflor';

$conection = @mysqli_connect($host, $user, $password, $db);
if (!$conection) {

    echo "Error en la conexion";
}

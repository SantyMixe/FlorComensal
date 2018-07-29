<?php

include 'conexion.php';
if(!empty($_POST)){
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$celular=$_POST['celular'];
$personas=$_POST['personas'];
$tipo=$_POST['tipo'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];


 $query_insert = mysqli_query($conection,"INSERT INTO reservar (id,nombre,correo,celular,personas,tipo,fecha,hora) VALUES ('','$nombre','$correo','$celular','$personas','$tipo','$fecha','$hora')");
    
if ($query_insert){
    echo"registrado";
	// header("location:reservaciones.php");

}
}
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Marble &mdash; Free HTML5 Bootstrap Website Template by FreeHTML5.co</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
    <meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="FreeHTML5.co" />

    <!--
												//////////////////////////////////////////////////////

												FREE HTML5 TEMPLATE
												DESIGNED & DEVELOPED by FreeHTML5.co

												Website: 		http://freehtml5.co/
												Email: 			info@freehtml5.co
												Twitter: 		http://twitter.com/fh5co
												Facebook: 		https://www.facebook.com/fh5co

												//////////////////////////////////////////////////////
												-->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->

    <!-- Flexslider  -->
    <link rel="stylesheet" href="css/flexslider.css">
    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->

    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
												<script src="js/respond.min.js"></script>
												<![endif]-->

    <!-- Librerias Bootstrap 4 para el carrusel-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <div id="fh5co-page">
        <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
        <aside id="fh5co-aside" role="complementary" class="border js-fullheight">

            <h1 id="fh5co-logo"><a href="index.html">LA FLOR DEL COMENSAL</a></h1>
            <nav id="fh5co-main-menu" role="navigation">
                <ul>
                    <li><a href="index.html">ESPECIALIDADES DE LA CASA</a></li>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <li><a href="index.php">REGRESAR</a></li>
                </ul>
            </nav>
        </aside>
        <div id="fh5co-main">
            <div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
                <div class="row">
                    <div class="col-md-4">
                        <h2>RESERVACION</h2>
                    </div>
                </div>
                <form  method="POST" >
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Nombre Completo</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Correo</label>
                            <input type="email" class="form-control" name="correo" placeholder="Correo" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Celular</label>
                            <input type="tel" class="form-control" name="celular" pattern="[0-9]{10}" placeholder="Celular" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Numero de Personas</label>
                            <input type="number" name="personas" min="1" max="500" class="form-control" id="inputPassword4" placeholder="Numero de Personas" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Tipo de Evento</label>
                            <select name="tipo" class="form-control" required>
                                    <option selected></option>
                                    <option>Casual</option>
                                    <option>Negocios</option>
                                    <option>Aniversario</option>
                                    <option>Compromiso</option>
                                  </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputPassword4">Fecha</label>
                            <br>
                              <input type="date" name="fecha" required>
                            <br>
                        </div>
                        <div class="form-group col-md-2">
                                <label for="inputPassword4">Hora</label>
                                <br>
                                <input type="time" name="hora" max="21:00:00" min="08:00:00" required>
                        </div>
                    </div>
                      <br>
                      <br>
                      <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
                </form>
            </div>
            <div class="fh5co-more-contact">
                <div class="fh5co-narrow-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
                                <div class="fh5co-icon">
                                    <i class="icon-map"></i>
                                </div>
                                <div class="fh5co-text">
                                    <p> Avenida Vallarta Eje Poniente 1110, Americana, 44160 Guadalajara, Jal.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
                                <div class="fh5co-icon">
                                    <i class="icon-phone"></i>
                                </div>
                                <div class="fh5co-text">
                                    <p><a href="tel://">(01)33 1605 8737</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Flexslider -->
    <script src="js/jquery.flexslider-min.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
    <script src="js/google_map.js"></script>


    <!-- MAIN JS -->
    <script src="js/main.js"></script>

</body>

</html>

<?php

$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
    header('location: System/');
} else {

    if (!empty($_POST)) {
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $alert = 'Ingrese su usuario y contraseña';
            
        } else {
            require_once "conexion.php";
            $user = mysqli_real_escape_string($conection, $_POST['usuario']);
            $pass = md5(mysqli_real_escape_string($conection, $_POST['clave']));

            $query = mysqli_query($conection, "SELECT * FROM usuario WHERE usuario='$user' AND clave='$pass'");
            mysqli_close($conection);
            $result = mysqli_num_rows($query);

            if ($result > 0) {
                $data               = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['idusuario'] = $data['idusuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['correo']  = $data['correo'];
                $_SESSION['usuario']   = $data['usuario'];
                $_SESSION['rol']    = $data['rol'];
            
            header('location: System/');
            if($_SESSION['rol'] ==4 ){
            header("location:Cliente/reservaciones.php"); 
            }
            } else {
                $alert = 'Usurio y/o contraseña incorrecta';
                session_destroy();
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
    <section id="container">
      <form action="" method="post">
      <img class="img" src="assets/img/logo.png" alt="logotipo" width="200px" height="100px">
             <h4 style="color: grey">Iniciar sesion</h4>

           <input type="text" name="usuario" placeholder="Usuario">
           <input type="password" name="clave" placeholder="contraseña">
          <!-- <div class="form-group col-md-12">
                                      <h4 style="color: grey">Mesa</h4>
                                      <select name="tipo" class="form-control" required>
                                              <option selected></option>
                                              <option><h4 style="color: grey">Mesa 1</h4></option>
                                              <option><h4 style="color: grey">Mesa 2</h4></option>
                                              <option><h4 style="color: grey">Mesa 3</h4></option>
                                              <option><h4 style="color: grey">Mesa 4</h4></option>
                                              <option><h4 style="color: grey">Mesa 5</h4></option>
                                              <option><h4 style="color: grey">Mesa 6</h4></option>
                                            </select>
            </div>-->
            <br>
            <br>
           <input type="submit" value="Ingresar">

           <div class="alert"> <?php echo isset($alert) ? $alert : '' ?></div>


             <a href="../index.php"  style="color: grey" ><center>Salir</center></a>
       </form>

    </section>





</body>
</html>

<?php  

 require_once 'Modelo/conexion.php';

 class UsuariosModel{
         
          #-----------------------------------------------------------
       #obtener todas usuarios
         public function getUsuariosModel($tabla){
         	
		 	$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		 	$sql->execute();
		 	return $sql->fetchAll();
		 	$sql->close();
		 }

      public function ingresarUsuariosModel($datosModel , $tabla){
      	$sql = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreusuario , password)VALUES(:nombreusuario,:password)");

      	$sql->bindParam(':nombreusuario' , $datosModel['nombreusuario'] , PDO::PARAM_STR);
      	$sql->bindParam(':password' ,$datosModel['password'], PDO::PARAM_STR);

      	if ($sql->execute()) {
      		return 'success';
      	}else{
      		return 'error';
      	}
      	$sql->close();
      }	


      	public function deleteUsuariosModel($datosModel,$tabla){
      $sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idusuario = :idusuario");

      $sql->bindParam(':idusuario', $datosModel, PDO::PARAM_INT);

      if ($sql->execute()) {
         return 'success';
      }else{
        return 'Error';
      }

      $sql->close();
    }


  public function editarUsuariosModel($datosModel , $tabla){
     $sql = Conexion::conectar()->prepare("UPDATE $tabla SET nombreusuario = :usuario, clave = :clave WHERE idusuario = :idusuario");

     $sql->bindParam(':usuario',$datosModel['usuario'] ,PDO::PARAM_STR);
     $sql->bindParam(':clave',$datosModel['clave'],PDO::PARAM_STR);
     $sql->bindParam(':idusuario',$datosModel['idusuario'],PDO::PARAM_STR);

     if ($sql->execute()) {
       return 'success';
     }else{
      return 'error';
     }

     $sql->close();
  }




 }
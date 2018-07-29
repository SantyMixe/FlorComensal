<?php  

 require_once 'Modelo/conexion.php';

 class ProductosModel{

 	 public function getProductosModel($tabla){
         
         $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla pro INNER JOIN categorias cat ON pro.idcategoria = cat.idcategoria ");
         $sql->execute();
         return $sql->fetchAll();

         $sql->close();

       }


 	public function agregarProductosModel($datosModel,$tabla){
 		$sql = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreproducto,idcategoria,idusuario,precio)
 			VALUES(:nombreproducto,:idcategoria,:idusuario,:precio)");

 		$sql->bindParam(':nombreproducto',$datosModel['nombreproducto'], PDO::PARAM_STR);
 		$sql->bindParam(':idcategoria',$datosModel['idcategoria'],PDO::PARAM_STR);
 		$sql->bindParam(':idusuario',$datosModel['idusuario'],PDO::PARAM_STR);
 		$sql->bindparam(':precio',$datosModel['precio'], PDO::PARAM_STR);

 		if ($sql->execute())  {
 			return 'success';
 		}else{
 			return 'error';
            
 		}

 		  $sql->close();

 	}

 	
     function actualizarProductosModel($datosModel,$tabla){
        $sql= Conexion::conectar()->prepare("UPDATE $tabla SET nombreproducto = :nombreproducto ,idcategoria = :idcategoria, precio = :precio, idusuario= :idusuario WHERE idproducto = :idproducto");

      $sql->bindParam(':nombreproducto',$datosModel['nombreproducto'], PDO::PARAM_STR);
      $sql->bindParam(':idcategoria',$datosModel['idcategoria'], PDO::PARAM_INT);
      $sql->bindParam(':precio',$datosModel['precio'], PDO::PARAM_INT);
      $sql->bindParam(':idusuario',$datosModel['idusuario'], PDO::PARAM_INT);
      $sql->bindParam(':idproducto',$datosModel['idproducto'], PDO::PARAM_INT);

           
      if($sql->execute()){

             return "success";
      }else{
    
       return  "error";
      }

      $sql->close();
    }


 	 public function deleteProductosModel($datosModel,$tabla){
      $sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idproducto = :idproducto");

      $sql->bindParam(':idproducto', $datosModel, PDO::PARAM_INT);

      if ($sql->execute()) {
         return 'success';
      }else{
        return 'Error';
      }

      $sql->close();
    }

 }
         

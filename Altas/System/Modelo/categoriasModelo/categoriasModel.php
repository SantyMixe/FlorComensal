<?php  

 require_once 'Modelo/conexion.php';

 class CategoriasModel{
         

        #-----------------------------------------------------------
       #INGRESAR NUEVAS CATEGORIAS
        public function agregarCategoriasModel($datosModel ,$tabla){
      $sql = Conexion::conectar()->prepare("INSERT INTO  $tabla (nombrecategoria) VALUES(:nombrecategoria)");

       $sql->bindParam(':nombrecategoria',$datosModel['nombrecategoria'], PDO::PARAM_STR);

       if ($sql->execute()) {
               return 'success';
            }else{
                return 'error';
            }

      $sql->close();
     }

          #-----------------------------------------------------------
       #OBTENER TODAS LAS CATEGORIAS
       public function getCategoriasModel($tabla){
         
         $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
         $sql->execute();
         return $sql->fetchAll();

         $sql->close();

       }

       public function editarCategoriasModel($datosModel,$tabla){
        $sql = Conexion::conectar()->prepare("SELECT * FROM  $tabla WHERE idcategoria = :idcategoria");

        $sql->bindParam(':idcategoria',$datosModel,PDO::PARAM_INT);

        $sql->execute();
        return $sql->fetch();

        $sql->close();
       }

     function actualizarCategoriaModel($datosModel,$tabla){
        $sql= Conexion::conectar()->prepare("UPDATE $tabla SET nombrecategoria = :nombrecategoria WHERE idcategoria = :idcategoria");

      $sql->bindParam(':nombrecategoria',$datosModel['nombrecategoria'], PDO::PARAM_STR);
      $sql->bindParam(':idcategoria',$datosModel['idcategoria'], PDO::PARAM_INT);
           
      if($sql->execute()){

             return "success";
      }else{
    
       return  "error";
      }

      $sql->close();
    }

     public function deleteCategoriasModel($datosModel,$tabla){
      $sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idcategoria = :idcategoria");

      $sql->bindParam(':idcategoria', $datosModel, PDO::PARAM_INT);

      if ($sql->execute()) {
         return 'success';
      }else{
        return 'Error';
      }

      $sql->close();
    }


 }
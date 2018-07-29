<?php  
ob_start();

class CategoriasController {

  public function agregarCategoriasController(){

  	if (isset($_POST['agregarCategorias'])) {
  	   
  	   $datosController = array("nombrecategoria"=>$_POST['nombrecategoria']
  	   	                         );
  	   	                        

  	   $respuesta = CategoriasModel::agregarCategoriasModel($datosController,'categorias');

  	   if ($respuesta == 'success') {
  	   	 header('location:okCategorias');
  	   }else{
             header('location:categorias');
 		      }
  	}
  }



    public function getCategoriasController(){
      $respuesta = CategoriasModel::getCategoriasModel('categorias');

       foreach ($respuesta as $row) {
         echo '<tr> 
              <td align="center"> '. $row['nombrecategoria'].'</td>
              <td align="center"><a href="index.php?action=editarcategoria&idcategoria='.$row['idcategoria'].'" <i class="fa fa-edit btn btn-primary btn-sm"></i> </a>
               <a class="fa fa-trash btn btn-danger  btn-sm" href="index.php?action=categorias&idBorrar='.$row['idcategoria'].'" &nbsp;  </a>
              </td>
              </tr>';
       }
    }

    public function editarCategoriasController(){
            $datosController= $_GET['idcategoria'];
      $respuesta = CategoriasModel::editarCategoriasModel($datosController,'categorias');

  echo'  <div class="col-md-8">  
              <div class="form-group">
              <label for="categoria-name" class="form-control-label">Nombre Categoria :</label>
                <input type="text" class="form-control" id="categoria-name" name="nombrecategoria" value="'.$respuesta['nombrecategoria'].' ">
              </div>       
        <input type="hidden" name="idcategoria" value="'.$respuesta['idcategoria'].'">
          <button type="submit" class="btn btn-primary" name="editarCategorias">Editar la  Categoria</button>
          </div>
   <div class="col-md-4">
     
   </div>';
    }
//<img src="assets/img/foto3.jpg" width="350" height="285"">
   public function actualizarCategoriaController(){
         if (isset($_POST['editarCategorias'])) {

          $datosController= array("nombrecategoria"=>$_POST['nombrecategoria'],
                                     'idcategoria'=>$_POST['idcategoria']);
          #pedir la informacion al modelo.

          $respuesta= CategoriasModel::actualizarCategoriaModel($datosController,'categorias');
      
          if ($respuesta == 'success') {
                header('location:okEdit');
          }
        }
     }


  public function deleteCategoriasController(){
     if (isset($_GET['idBorrar'])) {
      $datosController = $_GET['idBorrar'];

   #pedir la informacion al modelo.
      $respuesta = CategoriasModel::deleteCategoriasModel($datosController,'categorias');
      if ($respuesta == 'success') {
         header('location:borrarCategorias');
      }
     }
   }
     

}
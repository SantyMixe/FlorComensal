<div class="container">
  
<div class="card text-xs-center">
  <div class="card-header">
 <a href="reservas"><i class="fa fa-edit"> Volver</i></a>
  </div>
  <div class="card-block">
    <h4 class="card-title">Editar Reservas</h4>
    <p class="card-text">
    <?php 
      $editar = new MvcController();
      $editar->editarReservasController();
      $editar->actualizarReservasController();
     ?>
    </p>
  </div>
</div>
</div>
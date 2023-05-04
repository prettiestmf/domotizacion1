<?php
    require_once 'includes/header.php';
    require_once 'includes/modals/modal_hora_fecha.php';
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa fa-users"></i>  Lista de Horarios 
		  <button class="btn btn-success" type="button" onclick="openModal_horario()">  Nuevo Horario</button></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">lista de horarios</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tablehorarios">
                  <thead>
                    <tr>
                    <th>ACCIONES</th>
                      <th>ID</th>
                      <th>AULA</th>
                      <th>HORA DE ENCENDIDO</th>
                      <th>HORA DE APAGADO</th>
                      <th>FECHA</th>
                      <th>ESTADO</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

<?php
    require_once 'includes/footer.php';
?>
<?php
    require_once 'includes/header.php';
    require_once 'includes/modals/modal_alumno.php';
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa fa-user-graduate"></i>Proceso de Admisiones
          <button class="btn btn-success" type="button" onclick="openModal_alu()">Nueva admision</button></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Proceso de Admisiones</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tablealumnos">
                  <thead>
                    <tr>
                      <th>ACCIONES</th>
                      <th>ID</th>
                      <th>NOMBRE</th>
                      <th>EDAD</th>
                      <th>DIRECCION</th>
                      <th>CEDULA</th>
                      <th>TELEFONO</th>
                      <th>CORREO</th>
                      <th>FECHA DE SOLICITUD</th>
                      <th>FECHA DE LA CITA</th>
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
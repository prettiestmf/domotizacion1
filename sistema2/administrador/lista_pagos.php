<?php
    require_once 'includes/header.php';
    require_once 'includes/modals/modal_pago.php';
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa fa-user-graduate"></i> Lista de Pagos
          <button class="btn btn-success" type="button" onclick="openModal_gra()">Nuevo Pago</button></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">lista de pagos</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tablegrados">
                  <thead>
                    <tr>
                      <th>ACCIONES</th>
                      <th>ID</th>
                      <th>ALUMNO</th>
					  <th>OBJETO</th>
					  <th>MONTO</th>
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
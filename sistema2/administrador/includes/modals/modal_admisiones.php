<div class="modal fade" id="modalAlumno1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Nuevo Alumno</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAlumno1" name="formAlumno1">
        <input type="hidden" name="idalumno1" id="idalumno1" value="">
          <div class="form-group">
            <label for="control-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre1" id="nombre1">
          </div>
          <div class="form-group">
            <label for="control-label">Edad:</label>
            <input type="text" class="form-control" name="edad1" id="edad1">
          </div>
          <div class="form-group">
            <label for="control-label">Direccion:</label>
            <input type="text" class="form-control" name="direccion1" id="direccion1">
          </div>
          <div class="form-group">
            <label for="control-label">Cedula:</label>
            <input type="text" class="form-control" name="cedula1" id="cedula1">
          </div>
          <div class="form-group">
            <label for="control-label">Clave:</label>
            <input type="password" class="form-control" name="clave1" id="clave1">
          </div>
          <div class="form-group">
            <label for="control-label">Telefono:</label>
            <input type="text" class="form-control" name="telefono1" id="telefono1">
          </div>
          <div class="form-group">
            <label for="control-label">Correo:</label>
            <input type="text" class="form-control" name="correo1" id="correo1">
          </div>
          <div class="form-group">
            <label for="control-label">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" name="fecha_nac1" id="fecha_nac1">
          </div>
          <div class="form-group">
            <label for="control-label">Fecha de Registro:</label>
            <input type="date" class="form-control" name="fecha_reg1" id="fecha_reg1">
          </div>
          <div class="form-group">
              <label for="listEstado">Estado</label>
              <select class="form-control" name="listEstado1" id="listEstado1">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
              </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button class="btn btn-primary" id="action" type="submit">Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
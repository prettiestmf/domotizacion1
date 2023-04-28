<div class="modal fade" id="modalHorario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Nuevo Horario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formHorario" name="formHorario">
        <input type="hidden" name="idusuario" id="idusuario" value="">
          <div class="form-group">
            <label for="control-label">Aula:</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
          </div>
          <div class="form-group">
				<label for="control-label">Hora de encendido:</label>
				<input type="text" class="form-control" name="usuario" id="usuario">
          </div>
          <div class="form-group">
            <label for="control-label">Hora de apagado:</label>
            <input type="password" class="form-control" name="clave" id="clave">
          </div>
          <div class="form-group">
              <label for="listRol">Dia de la semana</label>
              <select class="form-control" name="dias_de_la_semana" id="listRol">
                  <option value="1">Lunes</option>
                  <option value="2">Martes</option>
                  <option value="3">Miercoles</option>
                  <option value="4">Jueves</option>
                  <option value="5">Viernes</option>
                  <option value="6">Sábado</option>

              </select>
          </div>
          <div class="form-group">
              <label for="listEstado">Estado</label>
              <select class="form-control" name="listEstado" id="listEstado">
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
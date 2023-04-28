<div class="modal fade" id="modalAlumnoProfesor" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Organizacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAlumnoProfesor" name="formAlumnoProfesor">
            <input type="hidden" name="idalumnoprofesor" id="idalumnoprofesor" value="">
            <div class="form-group">
                <label for="listEstado">Seleccione el Edificio</label>
                <select class="form-control" name="listAlumno" id="listAlumno">
                    <!-- CONTENIDO AJAX -->
                </select>
            </div>
            <div class="form-group">
                <label for="listEstado">Seleccione el Profesor</label>
                <select class="form-control" name="listProfesor" id="listProfesor">
                    <!-- CONTENIDO AJAX -->
                </select>
            </div>
            <div class="form-group">
                <label for="listEstado">Seleccione el Periodo</label>
                <select class="form-control" name="listPeriodo" id="listPeriodo">
                    <!-- CONTENIDO AJAX -->
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
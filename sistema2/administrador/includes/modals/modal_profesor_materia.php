<div class="modal fade" id="modalProfesorMateria" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Nuevo Profesor Materia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formProfesorMateria" name="formProfesorMateria">
            <input type="hidden" name="idprofesormateria" id="idprofesormateria" value="">
            <div class="form-group">
                <label for="listEstado">Seleccione el Profesor</label>
                <select class="form-control" name="listProfesor" id="listProfesor">
                    <!-- CONTENIDO AJAX -->
                </select>
            </div>
            <div class="form-group">
                <label for="listEstado">Seleccione el Grado</label>
                <select class="form-control" name="listGrado" id="listGrado">
                    <!-- CONTENIDO AJAX -->
                </select>
            </div>
            <div class="form-group">
                <label for="listEstado">Seleccione el Aula</label>
                <select class="form-control" name="listAula" id="listAula">
                    <!-- CONTENIDO AJAX -->
                </select>
            </div>
            <div class="form-group">
                <label for="listEstado">Seleccione la Materia</label>
                <select class="form-control" name="listMateria" id="listMateria">
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
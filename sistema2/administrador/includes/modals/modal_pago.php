<div class="modal fade" id="modalPago" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Nuevo pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formPago" name="formPago">
        <input type="hidden" name="idpago" id="idpago" value="">
			
			<div class="form-group">
				<label for="listEstado">Seleccione el alumno</label>
				<select class="form-control" name="listalumno" id="listalumno">
					<!-- CONTENIDO AJAX -->
				</select>
			</div>
			
			<div class="form-group">
				<label for="control-label">Monto:</label>
				<input type="text" class="form-control" name="monto" id="monto">
			</div>
			
			<div class="form-group">
				<label for="listEstado">Metodo</label>
				<select class="form-control" name="listmetodo" id="listmetodo">
					<option value="1">Efectivo</option>
					<option value="2">Tarjeta</option>
				</select>
			</div>
			<div class="form-group">
				<label for="listEstado">Objeto</label>
				<select class="form-control" name="listobjeto" id="listobjeto">
					<option value="1">Inscripcion</option>
					<option value="2">Mensualidad</option>
					<option value="2">Otros</option>
				</select>
			</div>
		  
			<div class="form-group">
				<label for="control-label">Fecha:</label>
				<input type="date" class="form-control" name="fecha" id="fecha">
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
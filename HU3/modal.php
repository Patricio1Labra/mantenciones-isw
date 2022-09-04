<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Mantencion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="needs-validation" novalidate method="post" action="">
                        <label class="form-label" for="Nombre">Ingresar Título</label>    
                        <input class="form-control" required type="text" name="Nombre" placeholder="Nombre" onkeypress="return valideKey(event);">
                        <br>
                        <label class="form-label" for="Tipo">Ingresar Tipo</label>
                        <select class="form-control" name="Tipo" id=""required>
                        <option value="" hidden>Seleccionar Tipo</option>
                        <?php
                            $sqlc = "SELECT `IDT` as id , `TIPOTITULO` as nombre FROM `TIPO`";
                            $resultadoc= mysqli_query($conex,$sqlc);
                            while($valores = mysqli_fetch_array($resultadoc)) {
                            echo '<option value="'. $valores['id'].'">'. $valores['nombre'].'</option>';
                            }
                        ?>
                        </select>
                        <br>
                        <label class="form-label" for="Tipo">Ingresar Descripción</label>
                        <input class="form-control" required type="text" name="Descripcion" placeholder="Descripción" onkeypress="return valideKey(event);">
                        <br>
                        <label class="form-label" for="Fecha">Ingresar Fecha</label>
                        <input class="form-control" required type="date" min="<?php echo date('Y-m-d'); ?>" name="Fecha" placeholder="Fecha">
                        <br>
                        <label class="form-label" for="Duracion">Ingresar Hora de inicio</label>
                        <input class="form-control" required type="time" name="Hora">
                        <br>
                        <label class="form-label" for="Duracion">Ingresar Duración</label>
                        <input class="form-control" required type="number" name="Duracion" placeholder="Duración(en minutos)" onkeypress="return valideKey(event);">
                        <br>
                        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>
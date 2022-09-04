<!-- Modal -->
<?php   
    echo'
    <div class="modal fade" id="exampleModal'.$fila['IDM'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar mantencion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form  class="needs-validation" novalidate method="post" action="">
        <label class="form-label" for="Nombre">Ingresar Título</label>    
        <input class="form-control" required type="text" name="Nombre" value="'.$fila['TITULO'].'" placeholder="Nombre" onkeypress="return valideKey(event);">
        <br>
        <label class="form-label" for="Tipo">Ingresar Tipo</label>
            <select class="form-control" name="Tipo" id=""required>
            <option value="" hidden>Seleccionar Tipo</option>';
                $sqlc = "SELECT `IDT` as id , `TIPOTITULO` as nombre FROM `TIPO`";
                $resultadoc= mysqli_query($conex,$sqlc);
                while($valores = mysqli_fetch_array($resultadoc)) {
                    if($valores['id']==$fila['IDT']){
                        echo '<option value="'.$valores['id'].'" selected>'.$valores['nombre'].'</option>';
                    }else{
                        echo '<option value="'. $valores['id'].'">'. $valores['nombre'].'</option>';
                    }
                }
            echo '
            </select>
            <br>
            <label class="form-label" for="Tipo">Ingresar Descripción</label>
            <input class="form-control" required type="text" value="'.$fila['DESCRIPCION'].'" name="Descripcion" placeholder="Descripción" onkeypress="return valideKey(event);">
            <br>
            <label class="form-label" for="Fecha">Ingresar Fecha</label>
            <input class="form-control" value="'.$fila['FECHASINHORA'].'" required type="date" min="'.date('Y-m-d').'" name="Fecha" placeholder="Fecha">
            <br>
            <label class="form-label" for="Hora">Ingresar Hora de inicio</label>
            <input class="form-control" required type="time" value="'.$fila['HORA'].'" name="Hora">
            <br>
            <label class="form-label" for="Duracion">Ingresar Duración</label>
            <input class="form-control" required type="number" value="'.$fila['DURACION'].'" name="Duracion" placeholder="Duración(en minutos)" onkeypress="return valideKey(event);">
            <br>
            <input value="'.$fila['IDM'].'" type="hidden" name="id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger border-0" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" name="editar">Guardar</button>
          ';include("editar.php"); echo '
          </form>
        </div>
      </div>
    </div>
  </div>';
    
?>

<?php include('../partes/optionaljavascript.php') ?>
        <script src="../scripts/validaform.js"></script>
        <script src="../scripts/validanumeroyletra.js"></script>

<?php
include("../con_db.php");
$ID = $_SESSION['ID'];
$consulta = "SELECT M.IDM,M.IDT, M.TITULO, M.DESCRIPCION, M.ESTADO,DATE_FORMAT(EN.FECHA, '%d/%m/%Y %H:%i:%S') AS FECHA,DATE_FORMAT(EN.FECHA, '%Y-%m-%d') AS FECHASINHORA,DATE_FORMAT(EN.FECHA, '%H:%i') AS HORA, EN.DURACION FROM MANTENCION M, ENCARGA EN WHERE M.IDM=EN.IDM AND EN.IDE='$ID' ORDER BY M.ESTADO,FECHA";
$resultado = mysqli_query($conex,$consulta);
$verFilas = mysqli_num_rows($resultado);
if(!$resultado){
    echo "ERROR DE LA CONSULTA";
}else{
    if($verFilas<1){
        echo "<tr>
                <td>Sin registros</td>
                <td>Sin registros</td>
                <td>Sin registros</td>
                <td>Sin registros</td>
                <td>Sin registros</td>
                <td>Sin registros</td>
            </tr>";
    }else{
        while($fila=mysqli_fetch_array($resultado)){
            if ($fila['ESTADO']=='P') {
                $fila['ESTADO']='Pendiente';
            }
            if ($fila['ESTADO']=='T') {
                $fila['ESTADO']='Terminado';
            }
            echo'
                    <tr>
                        <td scope="row">'.$fila['TITULO'].'</td>
                        <td>'.$fila['DESCRIPCION'].'</td>
                        <td>'.$fila['ESTADO'].'</td>
                        <td>'.$fila['FECHA'].'</td>
                        <td>'.$fila['DURACION'].'</td>
                        <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal'.$fila['IDM'].'"  >Editar</button>
                        <a href="borrar.php?idm='.$fila["IDM"].'"type="button" class="btn btn-danger border-0">Borrar</a>
                        </td>

                    </tr>
                    
                ';
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
                
        }
    }
}
?>

        <script src="../scripts/validaform.js"></script>
        <script src="../scripts/validanumeroyletra.js"></script>

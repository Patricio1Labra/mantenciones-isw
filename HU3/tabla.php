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
                        <a href=".php?idm='.$fila["IDM"].'"type="button" class="btn btn-danger">Borrar</a>
                        </td>

                    </tr>
                    
                ';
                include("modal.php"); 
                
        }
    }
}
?>

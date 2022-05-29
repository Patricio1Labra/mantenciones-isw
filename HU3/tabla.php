<?php
include("../con_db.php");
$ID = $_SESSION['IDE'];
$consulta = "SELECT M.TITULO, M.DESCRIPCION, M.ESTADO,DATE_FORMAT(EN.FECHA, '%d/%m/%y') AS FECHA, EN.DURACION FROM MANTENCION M, ENCARGA EN WHERE M.IDM=EN.IDM AND EN.IDE='$ID' ORDER BY M.ESTADO,FECHA";
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
                    </tr>
                ';
        }
    }
}
?>

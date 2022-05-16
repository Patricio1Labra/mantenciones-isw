<?php
include("../con_db.php");

$consulta = "SELECT M.TITULO, M.DESCRIPCION, M.ESTADO, EN.FECHA, EN.DURACION FROM MANTENCION M, ENCARGA EN WHERE M.IDM=EN.IDM";
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
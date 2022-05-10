<?php
include("../con_db.php");

$consulta = "SELECT TITULO, DESCRIPCION, ESTADO FROM MANTENCION";
$resultado = mysqli_query($conex,$consulta);
$verFilas = mysqli_num_rows($resultado);

$fila = mysqli_fetch_array($resultado);
if(!$resultado){
    echo "ERROR DE LA CONSULTA";
}else{
    if($verFilas<1){
        echo "<tr><td>Sin registros</td></tr>";
    }else{
        for ($i=0; $i <=$fila ; $i++) { 
            if($i%2!=0){
                echo'
                    <tr class = "table-primary text-primary">
                        <th scope="col">'.$fila[0].'</th>
                        <td>'.$fila[1].'</td>
                        <td>'.$fila[2].'</td>
                    </tr>
                ';
            }else{
                echo'
                    <tr class = "table-secondary text-primary">
                        <th scope="col">'.$fila[0].'</th>
                        <td>'.$fila[1].'</td>
                        <td>'.$fila[2].'</td>
                    </tr>
                ';
            }
            $fila = mysqli_fetch_array($resultado);
        }
    }
}
?>
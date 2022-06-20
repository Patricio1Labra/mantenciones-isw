<?php 
    $id=$_SESSION['ID'];
    $consulta="SELECT m.TITULO, m.DESCRIPCION, m.ESTADO, DATE_FORMAT(p.FECHA, '%d/%m/%Y') AS FECHA FROM MANTENCION m, PIDE p WHERE IDV='$id' AND m.IDM=p.IDM";
    $resultado= mysqli_query($conex,$consulta);
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
                </tr>";
        }else{
            while($fila=mysqli_fetch_array($resultado)){
                if ($fila['ESTADO'] == "P") $fila['ESTADO']='Pendiente';
                if ($fila['ESTADO'] == "A") $fila['ESTADO']='Aprobado';
                if ($fila['ESTADO'] == "R") $fila['ESTADO']='Rechazado';
                if ($fila['ESTADO'] == "F") $fila['ESTADO']='Fallido';
                if ($fila['ESTADO'] == "T") $fila['ESTADO']='Terminado';

                echo'
                        <tr>
                            <td scope="row">'.$fila['TITULO'].'</td>
                            <td>'.$fila['DESCRIPCION'].'</td>
                            <td>'.$fila['FECHA'].'</td>
                            <td>'.$fila['ESTADO'].'</td>
                        </tr>
                    ';
            }
        }
    }
?>
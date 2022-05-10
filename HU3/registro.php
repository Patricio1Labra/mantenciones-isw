<?php

include("../con_db.php");

if(isset($_POST['Siguiente'])){
    $nombre = $_POST['Nombre'];
    $tipo = $_POST['Tipo'];
    $descripcion = $_POST['Descripcion'];
    $fecha = $_POST['Fecha'];
    $duracion = $_POST['Duracion'];
    $ID;
    $IDM;
    if(!empty($nombre) && $tipo!=0 && !empty($descripcion)){
        $consulta = "INSERT INTO MANTENCION VALUES ('','$tipo','$nombre','$descripcion','P','')";
        $resultado = mysqli_query($conex,$consulta);
        if($resultado) {
            if(!empty($fecha) && !empty($duracion)){
                $consultaid ="SELECT IDE as id FROM ENCARGADO  WHERE NOMBRE ='Juan ito'";
                $res = mysqli_query($conex,$consultaid);
                if($res) {
                    while($valores = $res->fetch_array()) {
                        $ID= $valores['id'];
                    }
                }
                $consultaidm ="SELECT IDM as id FROM MANTENCION  WHERE IDT ='$tipo' && TITULO ='$nombre' && DESCRIPCION ='$descripcion'";
                $res = mysqli_query($conex,$consultaidm);
                if($res) {
                    while($valoresm = $res->fetch_array()) {
                        $IDM= $valoresm['id'];
                    }
                }
                $consulta = "INSERT INTO ENCARGA VALUES ('$ID','$IDM','$fecha','$duracion')";
                $resultado = mysqli_query($conex,$consulta);
                if($resultado) {
                    
                    
                }else{
                    echo "ha ocurrido un error";
                }
        
            }
            
        }else{
            echo "ha ocurrido un error";
        }

    }else{
        echo "rellene los campos porfavor";
    }
    
       
}?>
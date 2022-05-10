<?php

include("../con_db.php");

if(isset($_POST['Siguiente'])){
    $nombre = $_POST['Nombre'];
    $tipo = $_POST['Tipo'];
    $descripcion = $_POST['Descripcion'];
    if(!empty($nombre) && !empty($tipo) && !empty($descripcion)){
        $consulta = "INSERT INTO MANTENCION VALUES ('','$tipo','$nombre','$descripcion','P','')";
        $resultado = mysqli_query($conex,$consulta);
        if($resultado) {
            
            
        }else{
            echo "ha ocurrido un error";
        }

    }else{
        echo "rellene los campos porfavor";
    }
    
       
}?>
<?php

include("../con_db.php");

if(isset($_POST['Siguiente'])){
    $nombre = $_POST['Nombre'];
    $tipo = $_POST['Tipo'];
    if(!empty($nombre) && !empty($tipo)){
        $consulta = "INSERT INTO MANTENCION VALUES ('','$tipo','$nombre','descripcion','E',10,'2')";
        $resultado = mysqli_query($conex,$consulta);
        if($resultado) {
            
            
        }else{
            echo "ha ocurrido un error";
        }

    }else{
        echo "rellene los campos porfavor";
    }
    
       
}?>
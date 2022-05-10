<?php
    include('../con_db.php');

    if(isset($_POST['Enviar'])){
        $titul = $_POST['Titulo'];
        $tipo = $_POST['Tipo'];
        $descripcion = $_POST['Descripcion'];
        if(!empty($titul) && !empty($tipo) && !empty($descripcion)){
            $consult = "INSERT INTO mantencion VALUES ('','$tipo','$titul','$descripcion','P','')";
            $resultado = mysqli_query($conex,$consult);
            if($resultado) {
                echo "se deberia haber enviado";
            }else{
                echo "ha ocurrido un error";
            }

        }else{
            echo "rellene los campos porfavor";
        }
    }
?>
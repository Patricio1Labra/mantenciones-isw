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
                $consulta="SELECT IDM FROM mantencion where IDT='$tipo' && TITULO='$titul' && DESCRIPCION='$descripcion'";
                $resultado= mysqli_query($conex,$consulta);
                if($resultado){
                    while($row = $resultado->fetch_array()){
                        $id = $row['IDM'];
                    }
                    $consult = "INSERT INTO pide VALUES (1,'$id','SYSDATE()')";
                    $resultado = mysqli_query($conex,$consult);
                    if($resultado) {
                        print "<script>window.setTimeout(function() { window.location = './index.php' }, 0);</script>";
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
    }
?>
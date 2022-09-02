<?php
    include('../con_db.php');

    if(isset($_POST['Enviar'])){
        $titul = $_POST['Titulo'];
        $tipo = $_POST['Tipo'];
        $idv = $_SESSION['ID'];
        $descripcion = $_POST['Descripcion'];

        if(strlen($titul)>15){
            $titul = substr($titul,0,14);
        }
        if(strlen($descripcion)>30){
            $descripcion = substr($descripcion,0,29);
        }

        if(!empty($titul) && !empty($tipo) && !empty($descripcion)){
            $consult = "INSERT INTO MANTENCION VALUES (default,'$tipo','$titul','$descripcion','P','')";
            $resultado = mysqli_query($conex,$consult);
            if($resultado) {
                $consulta="SELECT IDM FROM MANTENCION where IDT='$tipo' && TITULO='$titul' && DESCRIPCION='$descripcion'";
                $resultado= mysqli_query($conex,$consulta);
                if($resultado){
                    while($row = $resultado->fetch_array()){
                        $id = $row['IDM'];
                    }
                    $consult = "INSERT INTO PIDE VALUES ('$idv','$id',SYSDATE())";
                    $resultado = mysqli_query($conex,$consult);
                    if($resultado) {
                        print "<script>window.setTimeout(function() { window.location = './index.php' }, 0);</script>";
                    }else{
                        #Insert en pide con error
                        echo "ha ocurrido un error";
                    }
                }else{
                    #IDM no encontrado
                    "ha ocurrido un error";
                }
            }else{
                #Insert en mantencion con error
                echo "ha ocurrido un error";
            }
        }else{
            #campos vacios
            echo "<script>";
            echo "Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Los campos estan vacios'
              })";
            echo "</script>";
        }
    }
?>
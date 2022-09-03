<?php
    include('../con_db.php');

    if(isset($_POST['Enviar'])){
        $titul = $_POST['Titulo'];
        $tipo = $_POST['Tipo'];
        $IDM = $_POST['IDM'];
        $idv = $_SESSION['ID'];
        $descripcion = $_POST['Descripcion'];
        if(!empty($titul) && !empty($tipo) && !empty($descripcion)){
            $consult = "UPDATE MANTENCION SET IDT='$tipo', TITULO='$titul', DESCRIPCION='$descripcion' WHERE IDM = $IDM";
            $resultado = mysqli_query($conex,$consult);
            if($resultado) {
                $consult = "UPDATE PIDE SET FECHA=SYSDATE() WHERE IDM = $IDM";
                $resultado = mysqli_query($conex,$consult);
                if($resultado) {
                    print "<script>window.setTimeout(function() { window.location = './index.php' }, 0);</script>";
                }else{
                    echo "ha ocurrido un error";
                }   
            }else{
                echo "<script>";
                echo "Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error con la base de datos, intente nuevamente'
                })";
                echo "</script>";
            }

        }else{
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
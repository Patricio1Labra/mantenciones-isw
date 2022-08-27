<?php

include("../con_db.php");

if(isset($_POST['Siguiente'])){
    $nombre = $_POST['Nombre'];
    $tipo = $_POST['Tipo'];
    $descripcion = $_POST['Descripcion'];
    $duracion = $_POST['Duracion'];
    $fecha = $_POST['Fecha'];
    $hora = $_POST['Hora'];
    $fe = $fecha.' '.$hora.':00';
    $f= new DateTime($fe);
    $f->modify('+'.$duracion.' minute');
    $fec= $f->format('Y-m-d H:i:s');
    $consul ="SELECT DATE_FORMAT(SYSDATE(), '%Y-%m-%d') AS FECHA";
                $res = mysqli_query($conex,$consul);
                if($res) {
                    while($valoresm = $res->fetch_array()) {
                        $Fechasis= $valoresm[0];
                    }
                }
    
    if ($fecha<$Fechasis && $fecha!='') {
        $fecha='1';
        
    }
    
    $ID;
    $IDM;
    $IDMa;
    if(!empty($nombre) && $tipo!=0 && !empty($descripcion) && (!empty($fecha) && $fecha!=1) && !empty($duracion)){
        $consultaidma ="SELECT MAX(IDM) as id FROM MANTENCION";
                $res = mysqli_query($conex,$consultaidma);
                if($res) {
                    while($valoresm = $res->fetch_array()) {
                        $IDMa= $valoresm['id'];
                    }
                }
        $IDMa=$IDMa+1;
        $consulta = "INSERT INTO MANTENCION VALUES ('$IDMa','$tipo','$nombre','$descripcion','P','')";
        $resultado = mysqli_query($conex,$consulta);
        if($resultado) {
            if(!empty($fecha) && !empty($duracion)){
                $ID = $_SESSION['ID'];
                $consultaidm ="SELECT MAX(IDM) as id FROM MANTENCION  WHERE IDT ='$tipo' && TITULO ='$nombre' && DESCRIPCION ='$descripcion'";
                $res = mysqli_query($conex,$consultaidm);
                if($res) {
                    while($valoresm = $res->fetch_array()) {
                        $IDM= $valoresm['id'];
                    }
                }
                $consulta = "INSERT INTO ENCARGA VALUES ('$ID','$IDM','$fe','','$duracion')";
                $resultado = mysqli_query($conex,$consulta);
                if($resultado) {
                    echo "<script>";
            echo "Swal.fire({
                icon: 'success',
                title: 'Mantencion registrada con exito',
                text: '".$fec."'
              })";
            echo "</script>";
                    
                    
                }else{
                    echo "ha ocurrido un error";
                }
        
            }
            
        }else{
            echo "ha ocurrido un error";
        }

    }else{
        
        if($fecha==1){
            echo "Fecha incorrecta (la fecha debe ser mayor o igual a la de hoy) ";    
        }else{
        echo "rellene los campos por favor";
        }
    }
    
       
}?>
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
                $consulta = "INSERT INTO ENCARGA VALUES ('$ID','$IDM','$fe','$fec','$duracion')";
                $resultado = mysqli_query($conex,$consulta);
                if($resultado) {
                    echo "<script>";
            echo "Swal.fire({
                icon: 'success',
                title: 'Mantencion registrada con exito'
                
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
    
       
}
if(isset($_POST['Siguiente2'])){
    $esta=false;
    $nombre = $_POST['Nombre'];
    $descripcion = $_POST['Descripcion'];
    if(strlen($nombre)>0 && strlen($descripcion)>0 && strlen($nombre)<15 && strlen($descripcion)<255){
        $consulta1 ="SELECT TIPOTITULO FROM TIPO";
        $res1 = mysqli_query($conex,$consulta1);
        if ($res1) {
            while($fila=mysqli_fetch_array($res1)){
                if (strcasecmp($fila['TIPOTITULO'],$nombre) == 0){
                    $esta=true;
                }
                
            }
        }
        if ($esta==false){
            $consulta ="INSERT INTO TIPO VALUES (default,'$nombre','$descripcion')";
            $res = mysqli_query($conex,$consulta);
            if($res) {
                alertabien('Se Añadio correctamente');
            }else{
                alertaerror('Ha ocurrido un error');
            }
        }else{
            alertaerror('El tipo ya existe');
        }
         
    }else{
        alertaerror('Debe ingresar un tamaño valido');
    }
}

function alertabien ($mensaje) {
    echo "<script>";
    echo "Swal.fire({
          icon: 'success',
          title: '".$mensaje."',
          showConfirmButton: false,
          timer: 1500
          })";
    echo "</script>";
    print "<script>window.setTimeout(function() { window.location = './index.php' }, 1500);</script>";
}
function alertaerror ($mensaje) {
    echo "<script>"; 
    echo "Swal.fire({
          icon: 'error',
          title: '".$mensaje."',
          showConfirmButton: false,
          timer: 1500
          })";
    echo "</script>";
}


?>
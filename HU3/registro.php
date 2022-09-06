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
    $sis=date("Y-m-d H:i:s");
    
    if (strtotime($fecha)< strtotime($sis) || $fecha!='') {
        $fecha='1';
    }
    
    $ID;
    $IDM;
    $IDMa;
    $horabien=false;
    if (strtotime($hora)> strtotime("07:59") && strtotime($hora)< strtotime("18:01") && $hora!=''){
        $horabien=true;
    }
    $esta=false;
    $consultatip ="SELECT IDT FROM TIPO";
        $restip = mysqli_query($conex,$consultatip);
        if ($restip) {
            while($fila=mysqli_fetch_array($restip)){
                if (strcasecmp($fila['IDT'],$tipo) == 0){
                    $esta=true;
                }
                
            }
        }
    if(!empty($nombre)&& strlen($nombre) <= 15 && $tipo!=0 && !empty($descripcion) && strlen($descripcion) <= 255 && (!empty($fecha) && $fecha!=1) && !empty($duracion) && $esta==true && $duracion>1 && $duracion<=300 && $horabien==true){
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
                    alertabien("Se registro Correctamente");
                }else{
                    alertaerror('Ha ocurrido un error');
                }
        
            }
            
        }else{
            alertaerror('Ha ocurrido un error');
        }

    }else{
        
        if($fecha==1){
            alertaerror("Fecha incorrecta (la fecha debe ser mayor o igual a la de hoy)");    
        }else{
        alertaerror ("rellene los campos por favor");
        }
    }
    
       
}
if(isset($_POST['Siguiente2'])){
    $esta=false;
    $nombre = $_POST['Nombre'];
    $descripcion = $_POST['Descripcion'];
    if(strlen($nombre)>0 && strlen($descripcion)>0 && strlen($nombre)<=15 && strlen($descripcion)<=255){
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
            alertaerror('El tipo ya existe intente nuevamente');
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
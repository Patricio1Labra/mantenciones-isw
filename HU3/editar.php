<?php 
if(isset($_POST['editar'])){
    $titulo = $_POST['Nombre'];
    $tipo = $_POST['Tipo'];
    $descripcion = $_POST['Descripcion'];
    $fecha = $_POST['Fecha'];
    $duracion = $_POST['Duracion'];
    $hora = $_POST['Hora'];
    $fe = $fecha.' '.$hora.':00';
    $f= new DateTime($fe);
    $f->modify('+'.$duracion.' minute');
    $fec= $f->format('Y-m-d H:i:s');
    $sis=date("Y-m-d H:i:s");
    $idm= $_POST['id'];
    if (strtotime($fecha)< strtotime($sis) && $fecha!='') {
        $fecha='1';
    }
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
    if(!empty($titulo)&& strlen($titulo) <= 15 && $tipo!=0 && !empty($descripcion) && strlen($descripcion) <= 255 && !empty($fecha) && $fecha!=1 && !empty($duracion) && $esta==true && $duracion>=1 && $duracion<=300 && $horabien==true){
        $consulta = "UPDATE MANTENCION SET IDT='$tipo',TITULO='$titulo',DESCRIPCION='$descripcion' WHERE IDM='$idm'";
        $res = mysqli_query($conex,$consulta);
                if($res) {
                    $consulta2 = "UPDATE ENCARGA SET FECHA='$fe',FECHAFIN='$fec',DURACION='$duracion' WHERE IDM='$idm'";
                    $res2 = mysqli_query($conex,$consulta2);
                    if($res2) {                      
                        echo "<script>";
                        echo "Swal.fire({
                            icon: 'success',
                            title: 'Se edito correctamente',
                            showConfirmButton: false,
                            timer: 1500
                          })";
                        echo "</script>";
                        print "<script>window.setTimeout(function() { window.location = './verMantenciones.php' }, 1500);</script>";

                    }else{
                        echo 'Error';
                    }
                }else{
                    echo "Error";
                }
    }else{
        echo "<script>";
                        echo "Swal.fire({
                            icon: 'error',
                            title: 'Ha ocurrido un error',
                            showConfirmButton: false,
                            timer: 1500
                          })";
                        echo "</script>";
                        print "<script>window.setTimeout(function() { window.location = './vermantenciones.php' }, 1500);</script>";

    }
    
}
?>

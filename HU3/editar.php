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
    $idm= $_POST['id'];
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
                        print "<script>window.setTimeout(function() { window.location = './vermantenciones.php' }, 1500);</script>";

                    }else{
                        echo 'Error';
                    }
                }else{
                    echo "Error";
                }
}
?>

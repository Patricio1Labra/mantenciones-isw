<?php   
include('../con_db.php');
$IDM=$_GET["idm"];
$consulta ="DELETE FROM ENCARGA WHERE IDM='$IDM'";
$res = mysqli_query($conex,$consulta);
if($res){
    $consulta2 ="DELETE FROM MANTENCION WHERE IDM='$IDM'";
    $res2 = mysqli_query($conex,$consulta2);
    if($res2){
        print "<script>window.setTimeout(function() { window.location = './vermantenciones.php' }, 0);</script>";
        
                        
    }else{
        echo "Error";
    }
}else{
    echo "error";
}

?>
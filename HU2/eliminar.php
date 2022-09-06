<?php   
include('../con_db.php');
$IDM=$_GET["idm"];
$consulta ="DELETE FROM PIDE WHERE IDM='$IDM'";
$res = mysqli_query($conex,$consulta);
if($res){
    $consulta2 ="DELETE FROM MANTENCION WHERE IDM='$IDM'";
    $res2 = mysqli_query($conex,$consulta2);
    if($res2){
        return header("Location:index.php");
    }else{
        echo "Error";
    }
}else{
    echo "error";
}
?>
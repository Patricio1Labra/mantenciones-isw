<?php   
include_once('../con_db.php');
$IDM=$_GET["idm"];
$consulta ="DELETE FROM PIDE WHERE IDM='$IDM'";
$res = mysqli_query($conex,$consulta);
if($res){
    $consulta ="DELETE FROM MANTENCION WHERE IDM='$IDM'";
    $res = mysqli_query($conex,$consulta);
    if($res){
        return header("Location:index.php");
    }else{
        return "error";
    }
}else{
    return "error";
}
?>
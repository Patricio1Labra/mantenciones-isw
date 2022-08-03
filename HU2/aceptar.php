<?php   
include_once('../con_db.php');
$IDM=$_GET["idm"];
    $consulta ="UPDATE MANTENCION SET ESTADO='A' WHERE IDM='$IDM'";
    $res = mysqli_query($conex,$consulta);

if($res){
    return header("Location:index.php");
}else{
    return "error";
}

?>
<?php   
include_once('../con_db.php');
$ESTADO=$_POST["ESTADO"];

$sentencia=$bd->prepare("UPDATE MANTENCION SET ESTADO= :ESTADO WHERE IDM=:IDM;");

$sentencia->bindParam(':ESTADO',$ESTADO);

if($sentencia->execute()){
    return header("Location:index.php");
}else{
    return "error";
}
?>
<?php 
    header('Content-Type: application/json; charset=utf8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");

    include('../con_db.php');

    $consulta = "SELECT e.IDM,m.TITULO as title,m.DESCRIPCION,DATE_FORMAT(e.FECHA,'%Y-%m-%d') as 'start' FROM ENCARGA e,MANTENCION m  WHERE e.IDM = m.IDM";
    $resultado= mysqli_query($conex,$consulta);
    if($resultado){
        $prueba = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
        echo json_encode($prueba);
    }
?>             
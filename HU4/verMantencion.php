<?php 
    header('Content-Type: application/json; charset=utf8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");

    include('../con_db.php');

    $consulta = "SELECT e.IDM as id,m.TITULO as title,m.DESCRIPCION as description,DATE_FORMAT(e.FECHA,'%Y-%m-%d %H:%i:%s') as 'start', DATE_FORMAT(e.FECHAFIN,'%Y-%m-%d %H:%i:%s') as 'end',e.DURACION as 'fduration', m.ESTADO as 'estado' FROM ENCARGA e,MANTENCION m  WHERE e.IDM = m.IDM";
    $resultado= mysqli_query($conex,$consulta);
    if($resultado){
        $prueba = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
        echo json_encode($prueba);
    }
?>             
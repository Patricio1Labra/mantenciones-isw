<?php

$pdo=new PDO("mysql:dbname=e5software_bd;host=127.0.0.1","root","");
// Seleccionar los eventos del calendario
$sentenciaSQL=$pdo->prepare("SELECT e.IDM,m.TITULO,m.DESCRIPCION,e.FECHA FROM ENCARGA e,MANTENCION m  WHERE e.IDM = m.IDM");
$sentenciaSQL->execute();

$eventos = [];

while($resultado = $sentenciaSQL->fetchAll(PDO :: FETCH_ASSOC)){
    $id = $resultado['IDM'];
    $titulo = $resultado['TITULO'];
    $descripcion = $resultado['DESCRIPCION'];
    $fecha = $resultado['FECHA'];

    $eventos[] = [
        'id' => $id,
        'titulo' => $titulo,
        'descripcion' => $descripcion,
        'fecha' => $fecha
    ];

}


echo json_encode($eventos); 

?>                      
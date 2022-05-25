<?php
    session_start();
    $_SESSION['id'] = '1';
    $id = $_SESSION['id'];
    $tipo = "vecino";
    $consulta="SELECT NOMBRE FROM VECINO WHERE IDV='$id'";
    $resultado= mysqli_query($conex,$consulta);
    if($resultado){   
        $_SESSION['nombre'] = mysqli_fetch_array($resultado)[0];
        $nombre = $_SESSION['nombre'];
    }

?>
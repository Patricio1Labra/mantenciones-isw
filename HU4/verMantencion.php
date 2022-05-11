<?php
    include("../con_db.php");
    $consulta = "SELECT * FROM ENCARGA e,MANTENCION m  WHERE e.IDM = m.IDM";
    $resultado = mysqli_query($conex,$consulta);

    
    

?>
<?php
    $server = "localhost";
    $user = "root";
    $contra = "";
    $bd = "e5software_bd";
    $conex =new mysqli($server,$user,$contra,$bd);
        if(!$conex){
            echo "error en el servidor";
        }
?>
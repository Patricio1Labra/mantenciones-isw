<?php
    $server = "localhost";
    $user = "root";
    $contra = "";
    $bd = "test";
    $conex =new mysqli($server,$user,$contra,$bd);
        if(!$conex){
            echo "error en el servidor";
        }
?>
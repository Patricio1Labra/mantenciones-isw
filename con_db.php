<?php
    $server = "146.83.194.142";
    $user = "E5software";
    $contra = "E5software1122";
    $bd = "E5software_bd";
    $conex =new mysqli($server,$user,$contra,$bd);
        if(!$conex){
            echo "error en el servidor";
        }
?>

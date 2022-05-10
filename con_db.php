<?php
 $server = "localhost";
 $user = "root";
 $contra = "";
 $bd = "E5software_bd";
 $conex =new mysqli($server,$user,$contra,$bd);
     if(!$conex){
         echo "error en el servidor";
     }

?>
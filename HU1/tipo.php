<?php
    $consulta="SELECT IDT, TIPOTITULO FROM TIPO";
    $resultado= mysqli_query($conex,$consulta);
    if($resultado){
        while($row = $resultado->fetch_array()){
            $id = $row['IDT'];
            $titulo = $row['TIPOTITULO'];
        ?>
        <option value=<?php echo $id?>><?php echo $titulo?></option>
        <?php
        }
    }
?>
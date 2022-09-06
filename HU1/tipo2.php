<?php
    $consulta="SELECT IDT, TIPOTITULO FROM TIPO";
    $resultado= mysqli_query($conex,$consulta);
    if($resultado){
        while($row = $resultado->fetch_array()){
            $idt = $row['IDT'];
            $titulo = $row['TIPOTITULO'];
            if($idt==$tipo){
                ?>
                <option value=<?php echo $idt?> selected><?php echo $titulo?></option>
                <?php
            }else{
                ?>
                <option value=<?php echo $idt?>><?php echo $titulo?></option>
                <?php
            }
        
        }
    }
?>
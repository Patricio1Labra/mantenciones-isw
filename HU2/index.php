<?php
    session_start();
    if (!isset($_SESSION['rol'])) {
        header("Location: ../login/login.php");
    }else{
        if ($_SESSION['rol'] != 1) {
            header("Location: ../inicio/index.php");
        }

    }

?> 
    <?php include('../partes/head.php') ?>
    <title>Gestión de solicitudes</title>
</head>

<body>
    <div class="d-flex" id="content-wrapper">
    <!-- sideBar -->
    <!-- sideBar -->
    <?php include('../partes/sidebar.php') ?>
    <!-- fin sideBar -->

        <div class="w-100">

    <!-- Navbar -->
        <?php include('../partes/nav.php') ?>
    <!-- Fin Navbar -->

        <!-- Page Content -->
        <div id="content" class="bg-grey w-100">

                <section class="bg-light py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <h1 class="font-weight-bold mb-0">Gestión de solicitudes </h1>
                                <p class="lead text-muted">Solicitudes de mantencion</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="bg-mix py-3">
                  <div class="table-responsive table-hover" id="TablaConsulta">
                      <table class="table">
                          <thead class="text-muted">
                              <th class="text-center">Tipo</th>
                              <th class="text-center">Titulo</th>
                              <th class="text-center">Descripcion</th>
                              <th class="text-center">Fecha solicitud</th>
                              <th class="text-center">Vecino</th>
                              <th class="text-center">Estado</th>
                              <th class="text-center">Acciones</th>
                         </thead>
                         <tbody>
                             <tr>
                             <?php
                                include('../con_db.php');
                                $consulta = "SELECT t.TIPOTITULO,m.TITULO,m.DESCRIPCION,p.FECHA,m.ESTADO,v.RUT,v.NOMBRE,m.IDM FROM MANTENCION m, TIPO t, PIDE p, VECINO v  WHERE p.IDM = m.IDM and v.IDV=p.IDV and m.IDT=t.IDT";
                                $resultado = mysqli_query($conex,$consulta);
                                if($resultado){
                                    while($row = $resultado->fetch_array()){
                                        if ($row['ESTADO']=='P') {
                                            $row['ESTADO']='Pendiente';
                                        }
                                        if ($row['ESTADO']=='T') {
                                            $row['ESTADO']='Terminado';
                                        }
                                        if ($row['ESTADO']=='A') {
                                            $row['ESTADO']='Aprobado';
                                        }
                                        echo'
                                <tr>
                                    <td class="text-center">'.$row["TIPOTITULO"].'</td>
                                    <td class="text-center">'.$row["TITULO"].'</td>
                                    <td class="text-center">'.$row["DESCRIPCION"].'</td>
                                    <td class="text-center">'.$row["FECHA"].'</td>
                                    <td class="text-center">'.$row["NOMBRE"].' '.$row["RUT"].'</td>
                                    <td class="text-center">'.$row["ESTADO"].'</td>';
                                    if($row["ESTADO"] == "Pendiente"){
                                        echo '<td class="text-center"><a href="aceptar.php?idm='.$row["IDM"].'"type="button" class="btn btn-success">
                                        Aprobar
                                      </a></td>
                                    </tr>
                                    ';
                                    }else{
                                        if($row["ESTADO"] =="Aprobado"){
                                            echo '<td class="text-center"><a href="finalizar.php?idm='.$row["IDM"].'"type="button" class="btn btn-danger">
                                        Finalizar
                                      </a></td>
                                    </tr>
                                    ';
                                        }else{
                                            echo '<td class="text-center"><button href="editar.php?idm= "type="button" class="btn btn-secondary" disabled="disabled">
                                            Finalizada
                                          </button></td>
                                        </tr>
                                        ';
                                        }
                                        
                                    }
                                    
                                
                                    }
                                }
                                ?>                    
                            </tr>
                        </tbody>
                     </table>
                 </div>  
                </section>
        </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include('../partes/optionaljavascript.php') ?>
</body>

</html>

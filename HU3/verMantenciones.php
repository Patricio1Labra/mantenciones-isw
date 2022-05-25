    <!-- head -->
    <?php include('../partes/head.php') ?>
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

    <!-- fin head -->


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
        <?php include('../con_db.php') ?>
        <div class="container col-11 m-2">
            <div class="row">
                <div class="col-12 my-3">
                    <div class="card rounded-0">
                        <div class="card-header bg-light">
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent">
                            <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                            <li class="breadcrumb-item">Mantencion de instalaciones</li>
                            <li class="breadcrumb-item"><a href="../HU3/index.php">Programacion de mantenciones</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ver mantenciones</li>
                        </ol>
                        </nav>
                        <h6 class="font-weight-bold mb-0">Ver mantenciones</h6>
                        </div>
                        <div class="card-body pt-2">
                        <div class="row justify-content-center mt-3">
                        <div class="col-md-12">
                            <table class="table table-striped" id="tabla">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Duracion (minutos)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include("../HU3/tabla.php");
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>                
                </div>
            </div>    
        </div>
    </div>
    <script src="../scripts/tablaMantenciones.js"></script>  
   
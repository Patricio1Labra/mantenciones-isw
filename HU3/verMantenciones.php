<?php
    session_start();
    if (!isset($_SESSION['rol'])) {
        header("Location: ../login.php");
    }else{
        if ($_SESSION['rol'] != 1) {
            header("Location: ../inicio/index.php");
        }

    }

?> 
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
                            <li class="breadcrumb-item">Mantención de instalaciones</li>
                            <li class="breadcrumb-item"><a href="../HU3/index.php">Programación de mantenciones</a></li>
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
                                        <th scope="col">Título</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Duración (minutos)</th>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="../scripts/tablaMantenciones.js"></script>  
   
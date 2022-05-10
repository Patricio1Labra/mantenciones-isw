    <!-- head -->
    <?php include('../partes/head.php') ?>
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
        <div class="container m-2">
            <div class="row">
                <div class="col-12 my-3">
                    <div class="card rounded-0">
                        <div class="card-header bg-light">
                            <h6 class="font-weight-bold mb-0">Ver Mantenciones</h6>
                        </div>
                        <div class="card-body pt-2">
                        <div class="row justify-content-center mt-3">
        <div class="col-md-6">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
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
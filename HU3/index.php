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
        <div class="col-lg-4 my-3">
        <div class="card rounded-0">
            <div class="card-header bg-light">
                <h6 class="font-weight-bold mb-0">Solicitudes</h6>
            </div>
            <div class="card-body pt-2">
            <form  method="post" action="">
            <label class="form-label" for="Nombre">Ingresar texto</label>    
            <input class="form-control" type="text" name="Nombre" placeholder="Nombre">
            <br>
            <label class="form-label" for="Rut">Ingresar tipo</label>
            <input class="form-control" type="text" name="Tipo" placeholder="Tipo">
            <br>
            <input class="btn btn-primary btn-sm" type="submit" name="Siguiente">
            <?php
                include("../HU3/registro.php");
            ?>
        </form>
        </div>
        </div>

                
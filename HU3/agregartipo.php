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
                <div class="col my-3">
                    <div class="card rounded-0">
                        <div class="card-header bg-light">
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent">
                            <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                            <li class="breadcrumb-item">Mantención de instalaciones</li>
                            <li class="breadcrumb-item"><a href="./index.php">Programación de mantenciones</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Añadir tipo de mantencion</a></li>
                        </ol>
                        </nav>
                            <h6 class="font-weight-bold mb-0">Añadir tipo de mantencion</h6>
                        </div>
                        <div class="card-body pt-2">
                        <form class="needs-validation" novalidate method="post" action="">
                        <label class="form-label" for="Nombre">Ingresar Título</label>    
                        <input class="form-control" required type="text" maxlength="15" name="Nombre" placeholder="Nombre" onkeypress="return valideKey(event);">
                        <br>
                        <label class="form-label" for="Descripcion">Ingresar Descripción</label>
                        <input class="form-control" required type="text" maxlength="255" name="Descripcion" placeholder="Descripción" onkeypress="return valideKey(event);">
                        <br>
                        <input class="btn btn-primary btn-sm" type="submit" name="Siguiente2">
                        <a class="btn btn-danger border-0 btn-sm" href="./index.php">Volver</a>
                        <?php
                            include("./registro.php");
                        ?>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <?php include('../partes/optionaljavascript.php') ?>
        <script src="../scripts/validaform.js"></script>
        <script src="../scripts/validanumeroyletra.js"></script>
</body>
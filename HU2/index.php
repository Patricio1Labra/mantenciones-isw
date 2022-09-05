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
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
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
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent">
                            <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                            <li class="breadcrumb-item">Mantención de instalaciones</li>
                            <li class="breadcrumb-item active" aria-current="page">Gestión de solicitudes</li>
                        </ol>
                    </nav>
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <h1 class="font-weight-bold mb-0">Gestión de solicitudes </h1>
                                <p class="lead text-muted">Solicitudes de mantencion</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                <div class="container">
                    <div class="my-2">
                        <div class="card rounded-0">
                        <table class="table table-striped" id="tabla">
                            <thead class="bg-azul">
                                <tr>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Fecha solicitud</th>
                                    <th scope="col">Vecino</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php                
                                    include("./mantencionesb.php");
                                    ?>
                                </tbody>
                        </table>
                        </div> 
                    </div> 
                </div>  
            </section>
        </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include('../partes/optionaljavascript.php') ?>
    <script src="../scripts/datatable.js"></script>
</body>

</html>

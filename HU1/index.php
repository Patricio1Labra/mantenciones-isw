
    <!-- Con_DB -->
    <?php include("../con_db.php") ?>
    <!-- Fin Con_DB -->

    <!-- head -->
        <?php 
        session_start();
        if (!isset($_SESSION['rol'])) {
            header("Location: ../login/login.php");
        }else{
            if ($_SESSION['rol'] != 2) {
                header("Location: ../inicio/index.php");
            }
        }
        include('../partes/head.php');
        ?>
        <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
        <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
        <title>Solicitud Mantención - Grupo 5</title>
    </head>
    <!-- fin head -->

<body>
    <div class="d-flex" id="content-wrapper">
    
    <!-- sideBar -->
        <?php include('../partes/sidebar.php');?>
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
                            <li class="breadcrumb-item active" aria-current="page">Solicitud de mantención</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-lg-9 col-md-8">
                            <h1 class="font-weight-bold mb-0">Solicitudes de mantención </h1>
                            <p class="lead text-muted">Pudes crear y revisar solicitudes</p>
                        </div>
                        <div class="col-lg-3 col-md-4 d-flex">
                            <a class="btn btn-primary w-100 align-self-center" href='./formulario.php'>Crear Solicitud</a>
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
                                        <th scope="col">Título</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Fecha Solicitado</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include("./mantenciones.php");
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <?php include('../partes/optionaljavascript.php') ?>
        <script src="../scripts/datatable.js"></script>

</body>

</html>
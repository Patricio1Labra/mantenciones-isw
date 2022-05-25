
    <!-- Con_DB -->
        <?php include("../con_db.php") ?>
    <!-- Fin Con_DB -->

    <!-- head -->
        <?php include('./partes/headindex.php') ?>
    <!-- fin head -->

    <!-- session -->
        <?php include('./session.php') ?>
    <!-- fin session -->

<body>
    <div class="d-flex" id="content-wrapper">
    
    <!-- sideBar -->
    <?php 
        if($tipo=="vecino"){
            include('./partes/sidebarvecino.php');
        }else{
            include('./partes/sidebar.php');
        }
    ?>
    <!-- fin sideBar -->

        <div class="w-100">

    <!-- Navbar -->
        
        <?php include('./partes/nav.php') ?>

    <!-- Fin Navbar -->

        <!-- Page Content -->
        <div id="content" class="bg-grey w-100">
            <section class="bg-light py-3">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
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
                                <thead class="table-dark">
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        
</body>

</html>
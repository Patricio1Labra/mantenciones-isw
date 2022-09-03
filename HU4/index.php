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
include('../partes/head.php') 
?>
<!-- fin head -->


<body>
    <?php include('../partes/calendarscript.php') ?>
    <div class="d-flex" id="content-wrapper">
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
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb bg-transparent">
                                            <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                                            <li class="breadcrumb-item">Mantención de Instalaciones</li>
                                            <li class="breadcrumb-item active" aria-current="page">Calendario</li>
                                        </ol>
                                    </nav>
                                    <h1 class="font-weight-bold mb-0">Calendario de Mantenciones </h1>
                                    <p class="lead text-muted">Programa de Mantención y Agenda</p>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </section>                    
                    
                    <section class="py-3">
                        <div class="container col-10">
                                <div class="col-10 ">
                                    <div id='CalendarioWeb'></div>
                                    <div class="row mt-2">
                                        <div class="ml-3">
                                            <i class="fas fa-circle fa-xl " style="color: #111B54"></i>
                                            <label>
                                                <b>Mantenciones pendientes</b>
                                            </label>
                                        </div>
                        </div>
                    
                                    
                            </div>
                        </div>
                        
                        
                    </section>

            </div>

        </div>
    </div>      

    <!-- fullcalendar --> 
    <script src="../scripts/calendar.js"></script>
    
    
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tituloEvento">Detalles de la Mantención</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-3">Título</dt>
                <dd class="col-sm-9" id="title"></dd>
                <dt class="col-sm-3">Descripción</dt>
                <dd class="col-sm-9" id="description"></dd>
                <dt class="col-sm-3">Estado</dt>
                <dd class="col-sm-9" id="estadoev"></dd>
                <dt class="col-sm-3">Fecha</dt>
                <dd class="col-sm-9" id="start"></dd>
                <dt class="col-sm-3">Duración</dt>
                <dd class="col-sm-9" id="duration"></dd>
            </dl>    
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
    </div>
</body>

</html>

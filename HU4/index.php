<!-- head -->
<?php include('../partes/head.php') ?>

<script src="../HU4/assets/js/jquery.min.js"></script>
<script src="../HU4/assets/js/moment.min.js"></script>
<!-- Full Calendar -->
<link rel="stylesheet"href="../HU4/assets/css/fullcalendar.min.css">
<script src="../HU4/assets/js/fullcalendar.min.js"></script>
<!-- fin head -->


<body>
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
                                    <h1 class="font-weight-bold mb-0">Calendario de Mantenciones </h1>
                                    <p class="lead text-muted">Programa de Mantención y Agenda</p>
                                </div>
                                
                            </div>
                        </div>
                    </section>                    
                    
                    <section>
                        <div class="container col-10">
                                <div class="col-10 ">
                                    <div id='calendar'></div>
                            </div>
                        </div>
                        
                        
                    
                    </section>

            </div>

        </div>
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
    
    <!-- Llamada fullcalendar --> 
    <script src="../HU4/assets/js/calendar.js"></script>
    
    
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tituloEvento">Titulo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div id="descripcionEvento"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success">Agregar </button>
            <button type="button" class="btn btn-success">Modificar</button>
            <button type="button" class="btn btn-danger" >Borrar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
    </div>
        
</body>

</html>

<!-- head -->
<?php include('../partes/head.php') ?>


<!-- fin head -->


<body>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales-all.js"></script>
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
                                    <div id='CalendarioWeb'></div>
                                    
                            </div>
                        </div>
                        
                        
                    
                    </section>

            </div>

        </div>
    </div>      

    <!-- fullcalendar --> 
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('CalendarioWeb');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: './verMantencion.php'
        });

        calendar.render();
        });

    </script>
    
    
    
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

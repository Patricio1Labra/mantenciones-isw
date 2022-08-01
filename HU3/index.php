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
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent">
                            <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                            <li class="breadcrumb-item">Mantención de instalaciones</li>
                            <li class="breadcrumb-item active" aria-current="page">Programación de mantenciones</a></li>
                        </ol>
                        </nav>
                            <h6 class="font-weight-bold mb-0">Registrar mantención</h6>
                        </div>
                        <div class="card-body pt-2">
                        <form class="needs-validation" novalidate method="post" action="">
                        <label class="form-label" for="Nombre">Ingresar Título</label>    
                        <input class="form-control" required type="text" name="Nombre" placeholder="Nombre" onkeypress="return valideKey(event);">
                        <br>
                        <label class="form-label" for="Tipo">Ingresar Tipo</label>
                        <select class="form-control" name="Tipo" id="" required>
                        <option value="" hidden>Seleccionar Tipo</option>
                        <?php
                            $sqlc = "SELECT `IDT` as id , `TIPOTITULO` as nombre FROM `TIPO`";
                            $resultadoc= mysqli_query($conex,$sqlc);
                            while($valores = mysqli_fetch_array($resultadoc)) {
                            echo '<option value="'. $valores['id'].'">'. $valores['nombre'].'</option>';
                            }
                        ?>
                        </select>
                        <br>
                        <label class="form-label" for="Tipo">Ingresar Descripción</label>
                        <input class="form-control" required type="text" name="Descripcion" placeholder="Descripción" onkeypress="return valideKey(event);">
                        <br>
                        <label class="form-label" for="Fecha">Ingresar Fecha</label>
                        <input class="form-control" required type="date" min="<?php echo date('Y-m-d'); ?>" name="Fecha" placeholder="Fecha">
                        <br>
                        <label class="form-label" for="Duracion">Ingresar Duración</label>
                        <input class="form-control" required type="number" name="Duracion" placeholder="Duración(en minutos)" onkeypress="return valideKey(event);">
                        <br>
                        <input class="btn btn-primary btn-sm" type="submit" name="Siguiente">
                        <a class="btn btn-success border-0 btn-sm" href="../HU3/verMantenciones.php">Ver mantenciones</a>
                        <?php
                            include("../HU3/registro.php");
                        ?>
                        </form>
                    </div>
                </div>    
            </div>
        </div>
        <script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
    })();
    </script>
        <script>
        function valideKey(evt){
            var code = (evt.which) ? evt.which : evt.keyCode;
            if(code >= 48 && code <= 57){
                return true;
            } else {
                if(code >= 65 && code <= 90){
                    return true;
                }else{
                    if(code >= 97 && code <= 122){
                        return true;
                    }else{
                        if(code == 32){
                            return true;
                        }else{
                            return false;
                        }
                     }
                }
            }
        }
    </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

                

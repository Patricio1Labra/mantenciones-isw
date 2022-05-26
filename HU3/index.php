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
                        <form  method="post" action="">
                        <label class="form-label" for="Nombre">Ingresar Título</label>    
                        <input class="form-control" type="text" name="Nombre" placeholder="Nombre">
                        <br>
                        <label class="form-label" for="Tipo">Ingresar Tipo</label>
                        <select class="form-control" name="Tipo" id="">
                        <option value="0">Seleccionar Tipo</option>
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
                        <input class="form-control" type="text" name="Descripcion" placeholder="Descripción">
                        <br>
                        <label class="form-label" for="Fecha">Ingresar Fecha</label>
                        <input class="form-control" type="date" min="<?php echo date('Y-m-d'); ?>" name="Fecha" placeholder="Fecha">
                        <br>
                        <label class="form-label" for="Duracion">Ingresar Duración</label>
                        <input class="form-control" type="text" name="Duracion" placeholder="Duración(en minutos)">
                        <br>
                        <input class="btn btn-primary btn-sm" type="submit" name="Siguiente">
                        <a class="btn btn-success btn-sm" href="../HU3/verMantenciones.php">Ver mantenciones</a>
                        <?php
                            include("../HU3/registro.php");
                        ?>
                        </form>
                    </div>
                </div>    
            </div>
        </div>
        

                

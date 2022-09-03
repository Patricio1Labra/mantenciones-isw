
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
        <title>Formulario Mantencion - Grupo 5</title>
    </head>
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
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent">
                            <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                            <li class="breadcrumb-item">Mantención de instalaciones</li>
                            <li class="breadcrumb-item"><a href="./index.php">Solicitud de mantención</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Formulario de mantención</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-lg-9 col-md-8">
                            <h1 class="font-weight-bold mb-0">Formulario de mantención </h1>
                            <p class="lead text-muted">Ingrese su solicitud</p>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="my-3">
                        <div class="card rounded-0">
                                <div class="card-header bg-primary">
                                    <h6 class="font-weight-bold mb-0 text-light">Solicitud</h6>
                                </div>
                                <div class="card-body pt-2">
                                    <form method="post" action="" class="needs-validation" id="formul" novalidate>
                                        <div class="form-group">
                                            <div class="col">
                                                <label for="Titulo" id="Nombre">Nombre de Mantención (15/15)</label>
                                                <input type="text" class="form-control" id="Titulo" name="Titulo" placeholder="Ingrese aquí su mantención" onkeypress="return valideKey(event);" onkeyup="cont(this,'Nombre de Mantención',15,'Nombre');" onkeydown="cont(this,'Nombre de Mantención',15,'Nombre');" maxlength=15 required>
                                                <div class="invalid-tooltip">
                                                    Ingrese un nombre
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col">
                                                <label for="Descripcion" id="Descripcio">Descripción (30/30)</label>
                                                <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Ingrese una descripción breve de su problema" onkeypress="return valideKey(event);" onkeyup="cont(this,'Descripción',30,'Descripcio');" onkeydown="cont(this,'Descripción',30,'Descripcio');" maxlength=30 required>
                                                <div class="invalid-tooltip">
                                                    Ingrese una descripción
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col">
                                                <label for="Tipo">Tipo</label>
                                                <select class="form-control" id="Tipo" name="Tipo" required>
                                                    <option value="" hidden>Seleccionar Tipo</option>
                                                    <?php
                                                        $consulta="SELECT IDT, TIPOTITULO FROM TIPO";
                                                        $resultado= mysqli_query($conex,$consulta);
                                                        if($resultado){
                                                            while($row = $resultado->fetch_array()){
                                                                $id = $row['IDT'];
                                                                $titulo = $row['TIPOTITULO'];
                                                            ?>
                                                            <option value=<?php echo $id?>><?php echo $titulo?></option>
                                                            <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <div class="invalid-tooltip">
                                                    Ingrese un tipo
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" name="Enviar" id="Enviar" hidden>
                                        <a type="button" onclick="enviar()" class="btn btn-primary border-0">Enviar</a>
                                        <a type="button" onclick="regresar()" class="btn btn-danger border-0">Cancelar</a>
                                        <?php include('./rellenar.php') ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    <?php include('../partes/optionaljavascript.php') ?>
    <script src="../scripts/validaform.js"></script>
    <script src="../scripts/validanumeroyletra.js"></script>
    <script src="../scripts/contador.js"></script>
    <script src="../scripts/regresar.js"></script>
    <script src="../scripts/enviar.js"></script>

</body>

</html>

    <!-- Con_DB -->
    <?php include("../con_db.php") ?>
    <!-- Fin Con_DB -->

    <!-- head -->
        <?php 
        session_start();
        $id=$_SESSION['ID'];
        if (!isset($_SESSION['rol'])) {
            header("Location: ../login/login.php");
        }else{
            if ($_SESSION['rol'] != 2) {
                header("Location: ../inicio/index.php");
            }
        }
        include('../partes/head.php');
        $IDM=$_GET["idm"];
        $consulta="SELECT m.TITULO, m.DESCRIPCION, m.ESTADO, m.IDT FROM MANTENCION m, PIDE p WHERE IDV='$id' AND m.IDM='$IDM' AND m.IDM=p.IDM";
        $resultado= mysqli_query($conex,$consulta);
        if($resultado){
            while($row = $resultado->fetch_array()){
                $titulo = $row['TITULO'];
                $descripcion = $row['DESCRIPCION'];
                $tipo = $row['IDT'];
            }
        }
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
                                                <label for="Titulo" id="Nombre">Nombre de Mantención (<?php echo 15-strlen($titulo)?>/15)</label>
                                                <input type="text" class="form-control" id="Titulo" name="Titulo" placeholder="Ingrese aquí su mantención" onkeypress="return valideKey(event);" onkeyup="cont(this,'Nombre de Mantención',15,'Nombre');" onkeydown="cont(this,'Nombre de Mantención',15,'Nombre');" maxlength=15 value=<?php echo $titulo?> required>
                                                <div class="invalid-tooltip">
                                                    Ingrese un nombre
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col">
                                                <label for="Descripcion" id="Descripcio">Descripción (<?php echo 30-strlen($descripcion)?>/30)</label>
                                                <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Ingrese una descripción breve de su problema" onkeypress="return valideKey(event);" onkeyup="cont(this,'Descripción',30,'Descripcio');" onkeydown="cont(this,'Descripción',30,'Descripcio');" maxlength=30 value="<?php echo $descripcion?>" required>
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
                                                                $idt = $row['IDT'];
                                                                $titulo = $row['TIPOTITULO'];
                                                                if($idt==$tipo){
                                                                    ?>
                                                                    <option value=<?php echo $idt?> selected><?php echo $titulo?></option>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <option value=<?php echo $idt?>><?php echo $titulo?></option>
                                                                    <?php
                                                                }
                                                            
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <div class="invalid-tooltip">
                                                    Ingrese un tipo
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" id="IDM" name="IDM" hidden value=<?php echo $IDM?>>
                                        <input type="text" name="Enviar" id="Enviar" hidden>
                                        <a type="button" onclick="enviar()" class="btn btn-primary border-0">Enviar</a>
                                        <a type="button" onclick="regresar()" class="btn btn-danger border-0">Cancelar</a>
                                        <?php include('./actualizar.php') ?>
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
    <script src="../scripts/contador.js"></script>
    <script src="../scripts/validanumeroyletra.js"></script>
    <script src="../scripts/contador.js"></script>
    <script src="../scripts/regresar.js"></script>
    

    <script>
        function enviar(){
            Swal.fire({
            title: 'Estas seguro',
            text: "Revise sus datos antes de enviar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, enviar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("Enviar").value="a";
                document.getElementById("formul").submit();
            }
            })
        }
    </script>

</body>

</html>
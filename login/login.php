    <?php include('../partes/head.php')?>
    <title>IG - Grupo 5</title>
</head>
<body>
<?php
    include("../con_db.php");
    session_start();
    if (isset($_GET['cerrar'])) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        
    }
    if (isset($_SESSION['rol'])) {
        switch($_SESSION['rol']){
            case 1;
                header("Location: ../inicio/index.php");
            break;
            case 2;
                header("Location: ../inicio/index.php");
            break;

            default;
        }
    }
    if (isset($_POST['rut']) && isset($_POST['pass'])){
        $rut =$_POST['rut'];
        $pass =$_POST['pass'];
        $sql="SELECT * FROM ENCARGADO WHERE RUT = '$rut' AND PASS = '$pass'";
        $resultado= mysqli_query($conex,$sql);
        $fila=mysqli_fetch_array($resultado);
        if($fila == false){
            $sql="SELECT * FROM VECINO WHERE RUT = '$rut' AND PASS = '$pass'";
            $resultado= mysqli_query($conex,$sql);
            $fila=mysqli_fetch_array($resultado);
        }
        if ($fila == true) {
            $rol= $fila['IDR'];
            $_SESSION['rol'] = $rol;
            $nombre= $fila['NOMBRE'];
            $_SESSION['nombre'] = $nombre;
            //ENCARGADO
            if($rol == 1){
                $ide= $fila['IDE'];
                $_SESSION['ID'] = $ide;
            }
            //VECINO
            if($rol == 2){
                $idv= $fila['IDV'];
                $_SESSION['ID'] = $idv;
            }
            header("Location: ../inicio/index.php");
        }else{
            //NO ES VECINO O ENCARGADO
            echo "<script>";
            echo "Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'
              })";
            echo "</script>";
        }
    }
?>
    <div class="d-flex" id="content-wrapper">
        <div class="w-100">
        <!-- Page Content -->
            <div id="content" class="bg-grey">
                <div class="bg-light w-50 mx-auto mt-5">
                    <div class="w-100">
                        <div class="card">
                            <div class="card-header bg-light m-2">
                                <h1>Iniciar sesion </h1>
                            </div>
                            <div class="card-body">
                                <form action="#" method="post">
                                        <label class="form-label" for="">Ingrese R.U.T</label>
                                        <input class="form-control" id="rut" maxlength=13 type="text" name="rut" placeholder="R.U.T" onkeypress="return valideKey(event);">
                                        <label class="form-label" for="">Ingrese contraseña</label>
                                        <input class="form-control" type="password" name="pass" placeholder="Contraseña">
                                        <input class="btn btn-primary form-control mt-3" type="submit" value="Iniciar sesion">
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../scripts/rut.js"></script>
    <script src="../scripts/validarut.js"></script>
</body>
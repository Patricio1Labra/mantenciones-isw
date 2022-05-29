<?php
    include("con_db.php");
    session_start();
    if (isset($_GET['cerrar'])) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        
    }
    if (isset($_SESSION['rol'])) {
        switch($_SESSION['rol']){
            case 1;
                header("Location: inicio/index.php");
            break;
            case 2;
                header("Location: inicio/index.php");
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
        if ($fila == true) {
            //ENCARGADO
            $rol= $fila['IDR'];
            $_SESSION['rol'] = $rol;
            $nombre= $fila['NOMBRE'];
            $_SESSION['nombre'] = $nombre;
            $ide= $fila['IDE'];
            $_SESSION['IDE'] = $ide;
            header("Location: inicio/index.php");
            /*switch($_SESSION['rol']){
                case 1;
                    header("Location: HU3/vermantenciones.php");
                break;
                case 2;
                    header("Location: inicio/index.php");
                break;
    
                default;
            }*/
        }else{
            //VECINO
            $sql="SELECT * FROM VECINO WHERE RUT = '$rut' AND PASS = '$pass'";
            $resultado= mysqli_query($conex,$sql);
            $fila=mysqli_fetch_array($resultado);
            if ($fila == true) {
                //VECINO
                $rol= $fila['IDR'];
                $_SESSION['rol'] = $rol;
                $nombre= $fila['NOMBRE'];
                $_SESSION['nombre'] = $nombre;
                header("Location: inicio/index.php");
                /*switch($_SESSION['rol']){
                    case 1;
                        header("Location: HU3/vermantenciones.php");
                    break;
                    case 2;
                        header("Location: inicio/index.php");
                    break;
        
                    default;
                }*/
            }else{
                //NO VECINO
                echo "no se puede";
            }
        }
    }
?>
<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">
    <!-- Ionic icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/6.0.1/collection/components/icon/icon.min.css" rel="stylesheet">
    <!-- CON ESTOS SCRIPTS PUEDES USAR LAS ALERTAS de SWEETALERT Y ALERFITY -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    
    <title>IG - Grupo 5</title>
</head>
<body>
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
                                        <input class="form-control" id="rut" type="text" name="rut" placeholder="R.U.T">
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
    <script>
      document.getElementById('rut').addEventListener('input', function(evt) {
      let value = this.value.replace(/\./g, '').replace('-', '');
  
      if (value.match(/^(\d{2})(\d{3}){2}(\w{1})$/)) {value = value.replace(/^(\d{2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4');} 
        else if (value.match(/^(\d)(\d{0,2})(\d{3})(\d{3})(\d{1})$/)) {value = value.replace(/^(\d{0,2})(\d{3})(\d{3})(\d{1})$/, '$1.$2.$3-$4');}
          else if (value.match(/^(\d)(\d{3})(\d{1,3})$/)) {value = value.replace(/^(\d{0,3})(\d{3})(\d{1})$/, '$1.$2-$3');}
            else if (value.match(/^(\d)(\d{1,3})$/)) {value = value.replace(/^(\d{0,3})(\d{1})$/, '$1-$2');}
      this.value = value;
}); 
    </script>
</body>
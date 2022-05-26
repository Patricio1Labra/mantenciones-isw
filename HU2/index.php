<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/6.0.1/collection/components/icon/icon.min.css" rel="stylesheet">
    
    <!-- CON ESTOS SCRIPTS PUEDES USAR LAS ALERTAS de SWEETALERT Y ALERFITY -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    
    <title>Gestión de solicitudes</title>
</head>

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

                <section class="bg-light py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <h1 class="font-weight-bold mb-0">Gestión de solicitudes </h1>
                                <p class="lead text-muted">Solicitudes de mantencion</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="bg-mix py-3">
                  <div class="table-responsive table-hover" id="TablaConsulta">
                      <table class="table">
                          <thead class="text-muted">
                              <th class="text-center">Tipo</th>
                              <th class="text-center">Titulo</th>
                              <th class="text-center">Descripcion</th>
                              <th class="text-center">Fecha solicitud</th>
                              <th class="text-center">Costo</th>
                              <th class="text-center">Estado</th>
                              <th class="text-center">Acciones</th>
                         </thead>
                         <tbody>
                             <tr>
                             <?php
                                include('../con_db.php');
                                $consulta = "SELECT t.TIPOTITULO,m.TITULO,m.DESCRIPCION,p.FECHA,m.COSTO,m.ESTADO FROM ENCARGA e,MANTENCION m, TIPO t, PIDE p  WHERE e.IDM = m.IDM";
                                $resultado = mysqli_query($conex,$consulta);
                                if($resultado){
                                    while($row = $resultado->fetch_array()){
                                        echo'
                                <tr>
                                    <td>'.$row["TIPOTITULO"].'</td>
                                    <td>'.$row["TITULO"].'</td>
                                    <td>'.$row["DESCRIPCION"].'</td>
                                    <td>'.$row["FECHA"].'</td>
                                    <td>'.$row["COSTO"].'</td>
                                    <td>'.$row["ESTADO"].'</td>
                                </tr>
                                ';

                                    }
                                }
                                ?>                    
                            </tr>
                        </tbody>
                     </table>
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
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, { 
                type: 'bar',
                data: {
                    labels: ['Feb 2021', 'Mar 2021', 'Abr 2021', 'May 2021'],
                    datasets: [{
                        label: 'Nuevos equipos',
                        data: [50, 100, 150, 200],
                        backgroundColor: [
                            '#12C9E5',  
                            '#12C9E5',
                            '#12C9E5',
                            '#111B54'
                        ],
                        maxBarThickness: 30,
                        maxBarLength: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            </script>
</body>

</html>

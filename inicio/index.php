    <!-- head -->
    <?php 
        session_start();
        if (!isset($_SESSION['rol'])) {
            header("Location: ../login/login.php");
        }
        include('../partes/head.php') 
    ?>
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
                                <h1 class="font-weight-bold mb-0">Bienvenido, somos el grupo 5 </h1>
                                <p class="lead text-muted">Esta pagina es un inicio de la aplicación web</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <?php include('../partes/optionaljavascript.php') ?>
    
</body>

</html>

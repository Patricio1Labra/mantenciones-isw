<!-- Sidebar -->
<div id="sidebar-container" class="bg-primary">
    <div class="logo">
        <h4><a class="text-light font-weight-bold mb-0" href="../" class="d-block text-light p-3 border-0">
        INGENIERÍA DE SOFTWARE</a></h4>
    </div>
    <div class="menu">
        <div class="item"><a href="../" class="d-block text-light p-3 border-0"><i class="fas fa-tachometer-alt"></i>Inicio</a></div>
        <div class="item"><a href="../" class="d-block text-light p-3 border-0"><i class="fas fa-users"></i>Usuarios</a></div>
        <div class="item"><a href="../" class="d-block text-light p-3 border-0"><i class="fas fa-drumstick-bite"></i>Gastos comunes</a></div>
        <div class="item"><a href="../" class="d-block text-light p-3 border-0"><i class="fas fa-drumstick-bite"></i>Comunicación</a></div>
        <div class="item"><a href="../" class="d-block text-light p-3 border-0"><i class="fas fa-drumstick-bite"></i>Reserva de espacios comunes </a></div>
        <div class="item"><a href="../" class="d-block text-light p-3 border-0"><i class="fas fa-drumstick-bite"></i>Visitas</a></div>
        <div class="item">
        <a id="s-menu" class="d-block user-select-none p-3 border-0 sub-btn drop"><i class="fas fa-solid fa-screwdriver-wrench"></i>Mantención de instalaciones<i id="icono" class="fas fa-caret-down drop"></i> </a>
            <div id="submenu" class="sub-menu ">
                <?php if ($_SESSION['rol'] == 1){?> 
                    <a href="../HU2/" class="sub-item">Gestión de Solicitudes</a>
                    <a href="../HU3/" class="sub-item">Programación de Mantenciones</a>    
                <?php }else{?>
                    <a href="../HU1/" class="sub-item">Solicitud de Mantención</a>                        
                    <a href="../HU4/" class="sub-item">Calendario de Mantenciones</a>
                <?php } ?>

            </div>
        </div>
        <div class="item"><a href="../" class="d-block text-light p-3 border-0"><i class="fas fa-chart-line"></i>Estadísticas</a></div>
        <div class="item"><a href="../perfil/" class="d-block text-light p-3 border-0"><i class="fas fa-user"></i>Perfil</a></div>
        <div class="item"><a href="../" class="d-block text-light p-3 border-0"><i class="fas fa-sliders-h"></i>Configuración</a></div>
    </div>
</div>
<script src="../scripts/sidebar.js"></script>
<!-- Fin sidebar -->
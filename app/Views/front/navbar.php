<!--Barra de navegación-->
<?php
$session = session();
$usuario = $session->get('usuario');
$perfil = $session->get('perfil_id');
?>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <!--Logo de la Empresa-->
        <a class="navbar-brand" href="<?php echo base_url('principal') ?>">
            <img src="<?php echo base_url('assets/img/logo.jpg') ?>" alt="Logo" width="75" class="d-inline-block align-text-top">
            <!--<img src="assets/img/logo.jpg" alt="Logo" width="75" class="d-inline-block align-text-top">-->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if (session()->perfil_id == 1) : ?>
            <div class="btn btn-susses active btnUser btn-sm">
                <a href="">Administrador: <?php echo session('usuario'); ?></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('principal') ?>">Inicio</a>
                        <!--Logo de la Empresa-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('quienes_somos') ?>">Quienes somos</a>
                        <!--<a class="nav-link" href="quienes_somos">Quienes somos</a>-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled nav-light" aria-disabled="true">Acerca de Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled nav-light" aria-disabled="true">Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/logout'); ?>" aria-disabled="true">Cerrar Sesión</a>
                    </li>
                </ul>
                <!--Buscador-->
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Buscar</button>
                </form>
            </div>
        <?php elseif (session()->perfil_id == 2) : ?>
            <div class="btn btn-info active btnUser btn-sm">
                <a href="">Usuario: <?php echo session('usuario') ?></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('principal') ?>">Inicio</a>
                        <!--Logo de la Empresa-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('quienes_somos') ?>">Quienes somos</a>
                        <!--<a class="nav-link" href="quienes_somos">Quienes somos</a>-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/logout'); ?>" aria-disabled="true">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        <?php else : ?>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('principal') ?>">Inicio</a>
                        <!--Logo de la Empresa-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('quienes_somos') ?>">Quienes somos</a>
                        <!--<a class="nav-link" href="quienes_somos">Quienes somos</a>-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled nav-light" aria-disabled="true">Acerca de Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled nav-light" aria-disabled="true">Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('registro') ?>">Registro</a>
                        <!--<a class="nav-link" href="registro">Registro</a>-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('login') ?>">Ingresar</a>
                        <!--<a class="nav-link" href="login">Ingresar</a>-->
                    </li>
                </ul>
                <!--Buscador-->
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Buscar</button>
                </form>
            <?php endif; ?>
            </div>
    </div>
</nav>
</div>
</header>
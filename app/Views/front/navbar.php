<!--Barra de navegación-->
<?php
$session = session();
$usuario = $session->get('usuario');
$perfil = $session->get('perfil_id');
?>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <!--Logo de la Empresa-->
        <a class="navbar-brand" href="<?= base_url('principal') ?>">
            <img src="<?= base_url('assets/img/logo.jpg') ?>" alt="Logo" width="75" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if (session()->perfil_id == 1) : ?>
            <div class="btn btn-success active btnUser btn-sm">
                <a href="">Administrador: <?= session('usuario'); ?></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('principal') ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('quienes_somos') ?>">Quienes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('usuarios') ?>">Usuarios registrados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/usuarios/edit/' . session('id_usuario')) ?>">Editar usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/logout'); ?>">Cerrar Sesión</a>
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
                <a href="'/usuario_logueado'">Usuario: <?= session('usuario') ?></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('principal') ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('quienes_somos') ?>">Quienes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/usuarios/edit/' . session('id_usuario')) ?>">Editar usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/logout'); ?>">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        <?php else : ?>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('principal') ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('quienes_somos') ?>">Quienes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('registro') ?>">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('login') ?>">Ingresar</a>
                    </li>
                </ul>
                <!--Buscador-->
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Buscar</button>
                </form>
            </div>
        <?php endif; ?>
    </div>
</nav>
</div>
</header>
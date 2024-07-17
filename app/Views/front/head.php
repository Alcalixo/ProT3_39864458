<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo ($titulo); ?></title>
    <!--<title>Game Over Studio</title>-->

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css/') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">

    <!--<link href="assets/css/bootstrap.min.css" rel="stylesheet">-->
    <!--<link rel="stylesheet" href="assets/css/style.css">-->
</head>
<header>
    <!--Nombre de la Empresa-->
    <div class="container-fluid">
        <div class="row">
            <h1>GAME OVER STUDIO</h1>
        </div>
        <!--Barra de navegación-->
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
                        <!--<li class="nav-item">
                            <a class="nav-link" href="proyectos">Proyectos</a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('registro') ?>">Registro</a>
                            <!--<a class="nav-link" href="registro">Registro</a>-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('login') ?>">Ingresar</a>
                            <!--<a class="nav-link" href="login">Ingresar</a>-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled nav-light" aria-disabled="true">Proximamente</a>
                        </li>
                    </ul>
                    <!--Buscador-->
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-secondary" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>

<body>
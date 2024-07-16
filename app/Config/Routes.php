<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->get('registro','Home::registro');
$routes->get('principal','Home::index');
$routes->get('quienes_somos','Home::quienes_somos');
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->get('registro', 'Home::registro');
$routes->get('principal', 'Home::index');
$routes->get('quienes_somos', 'Home::quienes_somos');

//Rutas del registro de usuarios
$routes->get('/registro', 'usuario_controller::create');
$routes->post('/enviar-form', 'usuario_controller::formValidation');

//Rutas del login
$routes->get('/login', 'login_controller');
$routes->post('/enviarlogin', 'login_controller::auth');
$routes->get('/panel', 'panel_controller::index', ['filter' => 'auth']);
$routes->get('logout', 'login_controller::logout');

//Rutas de la gestion de usuarios


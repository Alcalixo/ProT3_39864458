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

// Rutas del registro de usuarios
$routes->get('/registro', 'UsuarioController::create');
$routes->post('/enviar-form', 'UsuarioController::formValidation');

// Rutas del login
$routes->get('/login', 'LoginController::index');
$routes->post('/enviarlogin', 'LoginController::auth');
$routes->get('/panel', 'PanelController::index', ['filter' => 'auth']);
$routes->get('/logout', 'LoginController::logout');

// Rutas de la gestión de usuarios
$routes->get('/usuarios', 'UsuarioController::listar', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/usuarios/create', 'UsuarioController::create', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/usuarios/edit/(:num)', 'UsuarioController::edit/$1', ['filter' => 'auth']);
$routes->get('/usuarios/delete/(:num)', 'UsuarioController::delete/$1', ['filter' => 'auth']);
<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\UsuarioController;
use Controllers\PaginasController;
use Controllers\LoginController;

$router = new Router();

// Zona Privada
$router->get('/admin', [UsuarioController::class, 'index']);
$router->get('/users/crear', [UsuarioController::class, 'crear']);
$router->post('/users/crear', [UsuarioController::class, 'crear']);
$router->get('/users/actualizar', [UsuarioController::class, 'actualizar']);
$router->post('/users/actualizar', [UsuarioController::class, 'actualizar']);
$router->post('/users/eliminar', [UsuarioController::class, 'eliminar']);


// Zona Publica
$router->get('/', [PaginasController::class, 'index']);
$router->get('/contactanos', [PaginasController::class, 'contactanos']);
$router->post('/contactanos', [PaginasController::class, 'contactanos']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/salmonCoho', [PaginasController::class, 'salmonCoho']);
$router->get('/salmonAtlantico', [PaginasController::class, 'salmonAtlantico']);
$router->get('/truchaArcohiris', [PaginasController::class, 'truchaArcohiris']);
$router->post('/subirVideo', [PaginasController::class, 'subirVideo']);
$router->get('/subirVideo', [PaginasController::class, 'subirVideo']);
$router->get('/analisis', [UsuarioController::class, 'analisis']);
$router->get('/upload', [PaginasController::class,'upload']);
$router->post('/upload', [PaginasController::class,'upload']);

// prueba
$router->get('/index2', [PaginasController::class, 'index2']);
$router->post('/index2', [PaginasController::class, 'index2']);

// Enviar correos
$router->get('/enviar', [PaginasController::class, 'enviar']);
$router->post('/enviar', [PaginasController::class, 'enviar']);

// Login y autenticación
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Recuperar Password
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

// Confirmar cuenta
$router->get('/confirmar-cuenta', [UsuarioController::class, 'confirmar']);

$router->get('/mensaje', [UsuarioController::class, 'mensaje']);


$router->comprobarRutas();
<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AprendizController;
use Controllers\EmpresaController;

$router = new Router();



$router->get('/admin/admin', [AprendizController::class, 'index']);

$router->get('/aprendiz/crear', [AprendizController::class, 'crear']);
$router->get('/aprendiz/actualizar', [AprendizController::class, 'actualizar']);
$router->get('/aprendiz/consultar', [AprendizController::class, 'consultar']);
$router->post('/aprendiz/crear', [AprendizController::class, 'crear']);
$router->post('/aprendiz/actualizar', [AprendizController::class, 'actualizar']);
$router->post('/aprendiz/consultar', [AprendizController::class, 'consultar']);
$router->post('/aprendiz/eliminar', [AprendizController::class, 'eliminar']);

$router->get('/empresas/crear', [EmpresaController::class, 'crear']);
$router->get('/empresas/actualizar', [EmpresaController::class, 'actualizar']);
$router->get('/empresas/consultar', [EmpresaController::class, 'consultar']);
$router->post('/empresas/crear', [EmpresaController::class, 'crear']);
$router->post('/empresas/actualizar', [EmpresaController::class, 'actualizar']);
$router->post('/empresas/consultar', [EmpresaController::class, 'consultar']);
$router->post('/empresas/eliminar', [EmpresaController::class, 'eliminar']);

$router->comprobarRutas();
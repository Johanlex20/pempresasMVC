<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AprendizController;

$router = new Router();



$router->get('/admin/admin', [AprendizController::class, 'index']);
$router->get('/aprendiz/crear', [AprendizController::class, 'crear']);
$router->get('/aprendiz/actualizar', [AprendizController::class, 'actualizar']);
$router->get('/aprendiz/consultar', [AprendizController::class, 'consultar']);
$router->post('/aprendiz/crear', [AprendizController::class, 'crear']);
$router->post('/aprendiz/actualizar', [AprendizController::class, 'actualizar']);
$router->post('/aprendiz/consultar', [AprendizController::class, 'consultar']);
$router->post('/aprendiz/eliminar', [AprendizController::class, 'eliminar']);
$router->comprobarRutas();
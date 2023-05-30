<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AprendizController;
use Controllers\EmpresaController;
use Controllers\OfertaController;
use Controllers\ProgramaController;
use Controllers\TipoidentificacionController;

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

$router->get('/ofertas/crear', [OfertaController::class, 'crear']);
$router->get('/ofertas/actualizar', [OfertaController::class, 'actualizar']);
$router->get('/ofertas/consultar', [OfertaController::class, 'consultar']);
$router->post('/ofertas/crear', [OfertaController::class, 'crear']);
$router->post('/ofertas/actualizar', [OfertaController::class, 'actualizar']);
$router->post('/ofertas/consultar', [OfertaController::class, 'consultar']);
$router->post('/ofertas/eliminar', [OfertaController::class, 'eliminar']);

$router->get('/programas/crear', [ProgramaController::class, 'crear']);
$router->get('/programas/actualizar', [ProgramaController::class, 'actualizar']);
$router->get('/programas/consultar', [ProgramaController::class, 'consultar']);
$router->post('/programas/crear', [ProgramaController::class, 'crear']);
$router->post('/programas/actualizar', [ProgramaController::class, 'actualizar']);
$router->post('/programas/consultar', [ProgramaController::class, 'consultar']);
$router->post('/programas/eliminar', [ProgramaController::class, 'eliminar']);

$router->get('/tipoidentificacion/crear', [TipoidentificacionController::class, 'crear']);
$router->get('/tipoidentificacion/actualizar', [TipoidentificacionController::class, 'actualizar']);
$router->get('/tipoidentificacion/consultar', [TipoidentificacionController::class, 'consultar']);
$router->post('/tipoidentificacion/crear', [TipoidentificacionController::class, 'crear']);
$router->post('/tipoidentificacion/actualizar', [TipoidentificacionController::class, 'actualizar']);
$router->post('/tipoidentificacion/consultar', [TipoidentificacionController::class, 'consultar']);
$router->post('/tipoidentificacion/eliminar', [TipoidentificacionController::class, 'eliminar']);

$router->comprobarRutas();
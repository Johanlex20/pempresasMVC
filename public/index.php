<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\LoginController;
use Controllers\AprendizController;
use Controllers\PerfilController;
use Controllers\EmpresaController;
use Controllers\OfertaController;
use Controllers\ProgramaController;
use Controllers\TipoidentificacionController;
use Controllers\PaginasController;
use Controllers\AplicarController;

$router = new Router();

//APLICAR
$router->get('/aplicar', [AplicarController::class, 'aplicar']);
$router->post('/aplicar', [AplicarController::class, 'aplicar']);
$router->get('/aplicar/consultar', [AplicarController::class, 'consultar']);
$router->post('/aplicar/consultar', [AplicarController::class, 'consultar']);

//ZONA ADMI
$router->get('/perfil/admin', [PerfilController::class, 'indexA']);
$router->get('/perfil/aprendiz', [PerfilController::class, 'indexZ']);
$router->get('/perfil/empresa', [PerfilController::class, 'indexE']);
$router->get('/perfil/admin-crear', [PerfilController::class, 'crear']);
$router->get('/perfil/admin-consultar', [PerfilController::class, 'consultar']);
$router->get('/perfil/admin-apli', [PerfilController::class, 'apli']);

//ZONA PRIVADA APRENDIZ
$router->get('/aprendiz/crear', [AprendizController::class, 'crear']);
$router->get('/aprendiz/actualizar', [AprendizController::class, 'actualizar']);
$router->get('/aprendiz/consultar', [AprendizController::class, 'consultar']);
$router->post('/aprendiz/crear', [AprendizController::class, 'crear']);
$router->post('/aprendiz/actualizar', [AprendizController::class, 'actualizar']);
$router->post('/aprendiz/consultar', [AprendizController::class, 'consultar']);
$router->post('/aprendiz/eliminar', [AprendizController::class, 'eliminar']);

//ZONA PRIVADA EMPRESAS
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

//ZONA DE CITAS
$router->get('/cita',[CitaController::class, 'index']);

//ZONA PUBLICA
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/anuncios', [PaginasController::class, 'anuncios']);
$router->get('/oferta', [PaginasController::class, 'oferta']);
$router->get('/eleccion', [PaginasController::class, 'eleccion']);
$router->get('/hojadevida', [PaginasController::class, 'hojadevida']);

$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

//LOGIN Y AUTENTICACION
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);
$router->get('/registro', [PaginasController::class, 'registro']);

//RECUPERAR PASSWORD
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);

//CONFIRMAR CUENTA
$router->get('/confirmar', [LoginController::class,'confirmar']);
$router->get('/mensaje', [LoginController::class,'mensaje']);

$router->comprobarRutas();
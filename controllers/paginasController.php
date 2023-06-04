<?php
namespace Controllers;

use MVC\Router;
use Model\ofertas;

class PaginasController{
    public static function index ( Router $router ){

        $oferta = ofertas::get(4);

        $router->render2('paginas/index', [
            'oferta' => $oferta
        ]);
    }
    public static function nosotros (){
        echo "Desde Nosotros";
    }
    public static function anuncios (Router $router){

        $oferta = ofertas::all();
        $oferta = ofertas::get(4);//este mientras encuentro como mostrar las ofertas en columnas

        $router->render2('paginas/anuncios', [
            'oferta' => $oferta    
        ]);
    }
    public static function oferta ( Router $router){

        $id = validarORedireccionar('/auncios');

        //BUSCAR LA OFERTA POR SU ID
        $oferta = ofertas::find($id);

        $router->render2 ('paginas/oferta', [
            'oferta' => $oferta
        ]);
    }
    public static function eleccion(Router $router){
        $router->render2 ('eleccion/eleccion');
    }
    public static function contacto (){
        echo "Desde contacto";
    }

}
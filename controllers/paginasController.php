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
    public static function oferta (){
        echo "Desde Oferta";
    }
    public static function eleccion(){
        echo "Desde Eleccion Registro";
    }
    public static function contacto (){
        echo "Desde contacto";
    }
    public static function login (){
        echo "Desde Login";
    }
}
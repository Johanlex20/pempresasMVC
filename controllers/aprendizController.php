<?php

namespace Controllers;
use MVC\Router;
use Model\aprendiz;
use Model\programa;
use Model\Tipoidentificacion;


class AprendizController{
    public static function index (Router $router){

        $aprendiz = aprendiz::all();
        $resultado = null;

        $router->render('admin/admin', [
            'aprendiz' => $aprendiz,
            'resultado' => $resultado
        ]);
    }
    public static function crear(Router $router){
        $aprendiz = new aprendiz;
        $tipoidentificacion = Tipoidentificacion::all();
        $tipoprogramas = programa::all(); 
       
        
        $router->render2('aprendiz/crear' , [
            'aprendiz' => $aprendiz,
            'tipoidentificacion' => $tipoidentificacion,
            'tipoprogramas' => $tipoprogramas
        ]);
    }
    public static function actualizar(){
        echo "Actualizar Aprendiz";
    }
    public static function consultar(){
        echo "Consultar Aprendiz";
    }
}
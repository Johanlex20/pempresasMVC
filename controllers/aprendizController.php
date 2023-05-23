<?php

namespace Controllers;
use MVC\Router;
use Model\aprendiz;


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
        
        $router->render2('aprendiz/crear' , [
            'aprendiz' => $aprendiz
        ]);
    }
    public static function actualizar(){
        echo "Actualizar Aprendiz";
    }
    public static function consultar(){
        echo "Consultar Aprendiz";
    }
}
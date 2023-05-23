<?php

namespace Controllers;
use MVC\Router;
use Model\aprendiz;


class AprendizController{
    public static function index (Router $router ){

        $aprendiz = aprendiz::all();
        $resultado = null;

        $router->render('aprendiz/admin', [
            'aprendiz' => $aprendiz,
            'resultado' => $resultado
        ]);
    }
    public static function crear(){
        echo "CREAR Aprendiz";
    }
    public static function actualizar(){
        echo "Actualizar Aprendiz";
    }
    public static function consultar(){
        echo "Consultar Aprendiz";
    }
}
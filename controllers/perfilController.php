<?php
namespace Controllers;
use MVC\Router;

class PerfilController {
    public static function indexA (Router $router){
        $router->render('perfil/admin',[
            'titulo' => 'Perfil de Administración'
        ]);
    }
        public static function indexZ (Router $router){
        $router->render('perfil/aprendiz',[
            'titulo' => 'Perfil de Aprendiz'
        ]);
    }
        public static function indexE (Router $router){
        $router->render('perfil/empresa',[
            'titulo' => 'Perfil de Empresa'
        ]);
    }
}

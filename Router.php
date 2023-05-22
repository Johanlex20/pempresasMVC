<?php

namespace MVC;

class Router {
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function comprobarRutas(){
        $urlActual = $_SERVER ['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){
            $fn = $this->rutasGET [$urlActual] ?? null;
        }

        if ($fn){
            //LA FUNCION EXISTE Y HAY UNA FUNCIÓN ASOCIADA
            call_user_func($fn , $this);
        } else {
            echo "Página No Encontrada";
        }
    }

    //MOSTRANDO UNA VISTA
    public function render($view){
        include __DIR__ . "/views/$view.php";
    }
}
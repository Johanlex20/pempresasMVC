<?php

namespace MVC;

class Router {
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }
    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas(){

        session_start();
        $auth = $_SESSION['login'] ?? null;

        //ARREGLO DE RUTAS PROTEGIDAS
        $rutas_protegidas = [
            '/admin/admin',
            '/aprendiz/actualizar',
            '/aprendiz/consultar',
            '/aprendiz/eliminar',
            '/empresas/actualizar',
            '/empresas/consultar',
            '/empresas/eliminar',
            '/ofertas/crear',
            '/ofertas/actualizar',
            '/ofertas/consultar',
            '/ofertas/eliminar',
            '/programas/crear',
            '/programas/actualizar',
            '/programas/consultar',
            '/programas/eliminar',
            '/tipoidentificacion/crear',
            '/tipoidentificacion/actualizar',
            '/tipoidentificacion/consultar',
            '/tipoidentificacion/eliminar',

        ];

        $urlActual = strtok($_SERVER["REQUEST_URI"], '?') ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){
            $fn = $this->rutasGET [$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST [$urlActual] ?? null;
        }

        //PROTEGER LAS RUTAS
        if(in_array($urlActual, $rutas_protegidas) && !$auth){
            header('Location:/');
        }

        if ($fn){
            //LA FUNCION EXISTE Y HAY UNA FUNCIÓN ASOCIADA
            call_user_func($fn , $this);
        } else {
            echo "Página No Encontrada";
        }
    }

    //MOSTRANDO UNA VISTA
    public function render($view, $datos = [] ){

        foreach($datos as $key => $value){
            $$key = $value;
        }

        ob_start(); // Almacenamiento en memoria durante un momento...
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el buffer o lo que esta en memoria

        //UTILIZAR EL LAYOUT DE ACUERDO AL URL
        $urlActual = strtok($_SERVER["REQUEST_URI"], '?') ?? '/';
        if(str_contains($urlActual, '/perfil/admin')){
            include __DIR__ . "/views/layout.php";
        }elseif(str_contains($urlActual, '/perfil/aprendiz')){
            include __DIR__ . "/views/layoutA.php";
        }elseif(str_contains($urlActual, '/perfil/empresa')){
            include __DIR__ . "/views/layoutE.php";
        }else{
            include __DIR__ . "/views/layout2.php";
        }
    }

        //MOSTRANDO UNA VISTA
        // public function render2($view, $datos = [] ){

        //     foreach($datos as $key => $value){
        //         $$key = $value;
        //     }
    
        //     ob_start(); // Almacenamiento en memoria durante un momento...
        //     include __DIR__ . "/views/$view.php";
        //     $contenido = ob_get_clean(); // Limpia el buffer o lo que esta en memoria

        //      //UTILIZAR EL LAYOUT DE ACUERDO AL URL
        // $urlActual = strtok($_SERVER["REQUEST_URI"], '?') ?? '/';
        // if(str_contains($urlActual, '/admin')){
        //     include __DIR__ . "/views/layout.php";
        // }else{
        //     include __DIR__ . "/views/layout2.php";
        // }

            
        // }
}
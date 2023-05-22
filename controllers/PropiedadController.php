<?php

namespace Controllers;
use MVC\Router;

class PropiedadController{
    public static function index (Router $router ){
       $router->render('propiedades/admin');
    }
    public static function crear(){
        echo "CREAR PROPIEDAD";
    }
    public static function actualizar(){
        echo "Actualizar Propiedad";
    }
    public static function consultar(){
        echo "Consultar propiedad";
    }
}
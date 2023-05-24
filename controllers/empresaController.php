<?php

namespace Controllers;
use MVC\Router;
use Model\Empresas;
use Model\programa;
use Model\Tipoidentificacion;


class EmpresaController{
    public static function index (Router $router){

        $empresa = Empresas::all();
        $resultado = $_GET ['resultado'] ?? null; //envia el mensaje de creacion de usuario

        $router->render('admin/admin', [
            'empresa' => $empresa,
            'resultado' => $resultado
        ]);
    }
    public static function crear(Router $router){
        $empresa = new Empresas;
        $tipoidentificacion = Tipoidentificacion::all();
        $tipoprogramas = programa::all(); 
        //ARREGLO CON MENSAJES DE ERROR
        $errores = Empresas::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $empresa = new Empresas ($_POST['empresa']);
            
            $errores = $empresa->validar();
    
            //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
            if(empty($errores)){  
            //GUARDAR EN LA BD
            $empresa->guardar();
            }
        }
       
        
        $router->render2('empresa/crear' , [
            'empresa' => $empresa,
            'tipoidentificacion' => $tipoidentificacion,
            'tipoprogramas' => $tipoprogramas,
            'errores' => $errores
        ]);
    }
    public static function actualizar(){
        echo "Actualizar Empresa";
    }
    public static function consultar(Router $router){
        $empresa = Empresas::all();
        $resultado =$_GET['resultado'] ??null;

        $router->render2('empresa/consultar' , [
            'empresa' => $empresa
           
        ]);
    }
}
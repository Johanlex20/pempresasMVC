<?php

namespace Controllers;
use MVC\Router;
use Model\aprendiz;
use Model\programa;
use Model\Tipoidentificacion;


class AprendizController{
    public static function index (Router $router){

        $aprendiz = aprendiz::all();
        $resultado = $_GET ['resultado'] ?? null; //envia el mensaje de creacion de usuario

        $router->render('admin/admin', [
            'aprendiz' => $aprendiz,
            'resultado' => $resultado
        ]);
    }
    public static function crear(Router $router){
        $aprendiz = new aprendiz;
        $tipoidentificacion = Tipoidentificacion::all();
        $tipoprogramas = programa::all(); 
        //ARREGLO CON MENSAJES DE ERROR
        $errores = aprendiz::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $aprendiz = new aprendiz($_POST['aprendiz']);
            
            $errores = $aprendiz->validar();
    
            //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
            if(empty($errores)){  
            //GUARDAR EN LA BD
            $aprendiz->guardar();
            }
        }
       
        
        $router->render2('aprendiz/crear' , [
            'aprendiz' => $aprendiz,
            'tipoidentificacion' => $tipoidentificacion,
            'tipoprogramas' => $tipoprogramas,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin/admin');
        $aprendiz = aprendiz::find($id);
        $tipoidentificacion = Tipoidentificacion::all();
        $tipoprogramas = programa::all(); 
        $errores = aprendiz::getErrores();

        // METODO POST PARA ACTUALIZAR
        if($_SERVER['REQUEST_METHOD']==='POST'){

        //ASIGNAR LOS ATRIBUTOS
        $args = $_POST['aprendiz'];

        $aprendiz->sincronizar($args);
        
        //VALIDACION
        $errores = $aprendiz->validar();

        //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
        if(empty($errores)){  //empty es la funcion que reviza los arreglos esten vacios
            $aprendiz->guardar();      
        }
    }
        $router->render2('/aprendiz/actualizar', [
            'aprendiz' => $aprendiz,
            'tipoidentificacion' => $tipoidentificacion,
            'tipoprogramas' => $tipoprogramas,
            'errores' => $errores
        ]);

    }
    public static function consultar(Router $router){
        $aprendiz = aprendiz::all();
        $resultado =$_GET['resultado'] ??null;

        $router->render2('aprendiz/consultar' , [
            'aprendiz' => $aprendiz
           
        ]);
    }
}
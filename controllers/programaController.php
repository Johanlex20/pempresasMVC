<?php
namespace Controllers;
use MVC\Router;
use Model\programa; 

class ProgramaController{
    public static function index (Router $router){

        $programa = programa::all();
        $resultado = $_GET ['resultado'] ?? null; //envia el mensaje de creacion de usuario

        $router->render('admin/admin', [
            'programa' => $programa,
            'resultado' => $resultado
        ]);
    }
    public static function crear(Router $router){
        $programa = new programa;
        $errores = programa::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //CREAR UNA NUEVA ISNTANCIA
            $programa = new programa($_POST['programa']);
            $errores = $programa->validar();
            //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
            if(empty($errores)){  
                //GUARDAR EN LA BD
            $programa->guardar();
            }
        }   
        $router->render2('programas/crear' , [
            'programa' => $programa,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin/admin');
        $programa = programa::find($id);
        $errores = programa::getErrores();

        // METODO POST PARA ACTUALIZAR
        if($_SERVER['REQUEST_METHOD']==='POST'){

        //ASIGNAR LOS ATRIBUTOS
        $args = $_POST['programa'];

        $programa->sincronizar($args);
        
        //VALIDACION
        $errores = $programa->validar();

        //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
        if(empty($errores)){  //empty es la funcion que reviza los arreglos esten vacios
            $programa->guardar();      
        }
    }
        $router->render2('/programas/actualizar', [
            'programa' => $programa,
            'errores' => $errores
        ]);

    }
    public static function consultar(Router $router){
        $programa = programa::all();
        $resultado =$_GET['resultado'] ??null;

        $router->render2('programas/consultar' , [
            'programa' => $programa
           
        ]);
    }

}
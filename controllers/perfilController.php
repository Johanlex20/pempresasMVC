<?php
namespace Controllers;
use MVC\Router;
use Model\aprendiz;
use Model\programa;
use Model\Tipoidentificacion;

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
    public static function crear (Router $router){
        $router->render('perfil/admin-crear',[
            'titulo' => 'Zona Admin Creación'
        ]);
    }
    public static function consultar (Router $router){
        $router->render('perfil/admin-consultar',[
            'titulo' => 'Zona Admin Consultar'
        ]);
    }
    public static function apli (Router $router){
        $router->render('perfil/admin-apli',[
            'titulo' => 'Zona Admin Aplicaciones'
        ]);
    }
    
    // public static function actualizar(Router $router){
    //     $id = validarORedireccionar('/perfil/admin');
    //     $aprendiz = aprendiz::find($id);
    //     $tipoidentificacion = Tipoidentificacion::all();
    //     $tipoprogramas = programa::all(); 
    //     $errores = aprendiz::getErrores();

    //     // METODO POST PARA ACTUALIZAR
    //     if($_SERVER['REQUEST_METHOD']==='POST'){

    //     //ASIGNAR LOS ATRIBUTOS
    //     $args = $_POST['aprendiz'];

    //     $aprendiz->sincronizar($args);
        
    //     //VALIDACION
    //     $errores = $aprendiz->validar();

    //     //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
    //     if(empty($errores)){  //empty es la funcion que reviza los arreglos esten vacios
    //         $aprendiz->guardar();      
    //     }
    // }
    //     $router->render('/aprendiz/actualizar', [
    //         'aprendiz' => $aprendiz,
    //         'tipoidentificacion' => $tipoidentificacion,
    //         'tipoprogramas' => $tipoprogramas,
    //         'errores' => $errores
    //     ]);
    // }

}

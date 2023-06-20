<?php
namespace Controllers;
use MVC\Router;
use Model\Tipoidentificacion;

class TipoidentificacionController{
    public static function index (Router $router){

        $tipoidentificacion = Tipoidentificacion::all();
        $resultado = $_GET ['resultado'] ?? null; //envia el mensaje de creacion de usuario

        $router->render('perfil/admin', [
            'tipoidentificacion' => $tipoidentificacion,
            'resultado' => $resultado
        ]);
    }
    public static function crear(Router $router){
        $tipoidentificacion = new Tipoidentificacion;
        $tipoidentificacion = Tipoidentificacion::all();
        
        //ARREGLO CON MENSAJES DE ERROR
        $errores = Tipoidentificacion::getErrores();

    //EJECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //CREAR UNA NUEVA ISNTANCIA
        $tipoidentificacion = new Tipoidentificacion($_POST['tipoidentificacion']);

            //VALIDAR
            $errores = $tipoidentificacion->validar();

            if(empty($errores)){ 
            

            //GUARDAR EN LA BD
            $tipoidentificacion->guardar();     
            }
        }
        $router->render('tipoidentificacion/crear' , [
            'tipoidentificacion' => $tipoidentificacion,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin/admin');
        $tipoidentificacion = Tipoidentificacion::find($id);
        $errores = Tipoidentificacion::getErrores();

        // METODO POST PARA ACTUALIZAR
        if($_SERVER['REQUEST_METHOD']==='POST'){

            //ASIGNAR LOS ATRIBUTOS
            $args = $_POST['tipoidentificacion'];

            $tipoidentificacion->sincronizar($args);
            
            //VALIDACION
            $errores = $tipoidentificacion->validar();
            
            //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
            if(empty($errores)){  //empty es la funcion que reviza los arreglos esten vacios
                //ALMACENAR LA IMAGEN
                $tipoidentificacion->guardar();            
            }
        }

            $router->render('/tipoidentificacion/actualizar', [
                'tipoidentificacion' => $tipoidentificacion,
                'errores' => $errores
            ]);
        }
    public static function consultar(Router $router){
        $tipoidentificacion = Tipoidentificacion::all();
        $resultado =$_GET['resultado'] ??null;

        $router->render('tipoidentificacion/consultar' , [
            'tipoidentificacion' => $tipoidentificacion
           
        ]);
    }

    public static function eliminar(Router $router){
        if ($_SERVER ['REQUEST_METHOD'] === 'POST'){
            //VALIDAR ID
            $id = $_POST ['id'];
            $id = filter_var ($id, FILTER_VALIDATE_INT);

            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $tipoidentificacion = Tipoidentificacion::find($id);
                    $tipoidentificacion->eliminar();
                }  
            }
        }
    }
   
}
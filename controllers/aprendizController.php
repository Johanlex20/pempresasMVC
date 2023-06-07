<?php
namespace Controllers;

use Classes\Email;
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

        // $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $aprendiz = new aprendiz($_POST['aprendiz']);

            $aprendiz->sincronizar($_POST);   
            $errores = $aprendiz->validar();

            $resultado = $aprendiz->existeUsuario();

            if ($resultado->num_rows){
                $errores = aprendiz::getErrores();
            } else{
                //HASHEAR EL PASSWORD
                $aprendiz->hashPassword();

                //ELIMINAR PASSWORD2 
                unset($aprendiz->password2);

                //GENERAR UN TOKEN UNICO
                $aprendiz->crearToken();

                //ENVIAR EL EMAIL
                $email = new Email($aprendiz->email, $aprendiz->nombre, $aprendiz->token);
                $email->enviarConfirmacion();
                // debuguear($aprendiz);
            }
            //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
            if(empty($errores)){ 
            //VERIFICAR QUE EL USUARIO NO ESTE REGISTRADO
            //GUARDAR EN LA BD
            $aprendiz->guardar();  
                if($resultado){
                    header('Location: /mensaje?resultado=1'); 
                }
            }
        } 
        $router->render2('aprendiz/crear' , [
            'aprendiz' => $aprendiz,
            'tipoidentificacion' => $tipoidentificacion,
            'tipoprogramas' => $tipoprogramas,
            'errores' => $errores
        ]);
    }
    public static function mensaje (Router $router){
        $router->render2('auth/mensaje');
    }

    public static function confirmar (Router $router){
        $aprendiz = new aprendiz;

        $token = s($_GET['token']);

       if(!$token) header('Location: /login');

        $aprendiz = aprendiz::where('token', $token);

        if(empty($aprendiz)){
            aprendiz::setAlerta('error','Token No Válido');
             
        }else{
            
             //MODIFICAR A USUARIO CONFIRMADO
             $aprendiz->confirmado= 1;
             $aprendiz->token = null;
             unset($aprendiz->password2);
             $aprendiz->guardar();

             if (!$aprendiz->confirmado ===0){
                aprendiz::setAlerta('exito','EXITO INGRESO');
                $resultado=1;
             }

         }

            $errores = aprendiz::getErrores();
        
         $router->render2('auth/confirmar',[
            //  'errores' => 'Confirma tu cuenta en Empleo SENA CME',
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

    public static function eliminar(Router $router){
        if ($_SERVER ['REQUEST_METHOD'] === 'POST'){
            //VALIDAR ID
            $id = $_POST ['id'];
            $id = filter_var ($id, FILTER_VALIDATE_INT);

            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $aprendiz = aprendiz::find($id);
                    $aprendiz->eliminar();
                }  
            }
        }
    }
}
<?php
namespace Controllers;
use MVC\Router;
use Model\Admin;
use Model\aprendiz;

class LoginController{
    public static function login(Router $router){

        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Admin ($_POST);

            $errores = $auth->validar();

            if(empty($errores)){
                //VERIFICAR SI EL USUARIO EXISTE
                $resultado = $auth->existeUsuario();

                if(!$resultado){
                    $errores = Admin::getErrores();
                } else {
                
                //VERIFICAR PASSWORD
                $autenticado = $auth->comprobarPassword($resultado);

                    if($autenticado){
                        //AUTENTICAR EL USUARIO
                        $auth->autenticar();
                    } else{
                        //PASSWORD INCORRECTO (mensaje de error)
                        $errores = Admin::getErrores();
                    }
                }
            }
        }  
        $router->render2('auth/login',[
            'errores' => $errores
        ]);
    }

    public static function mensaje (Router $router){
        $router->render2('auth/mensaje');
    }
    public static function logout(){
        session_start();
        $_SESSION =[];

        header('Location: /');
    }

    public static function confirmar (Router $router){
        $errores = [];
        
        $aprendiz = new aprendiz;

        $token = s($_GET['token']);

       if(!$token) header('Location: /');

        $aprendiz = aprendiz::where('token', $token);

        if(empty($aprendiz)){
            aprendiz::setAlerta('error','Token No Válido');         
        }else{            
             //MODIFICAR A USUARIO CONFIRMADO
             $aprendiz->confirmado = "1";
             $aprendiz->token = null;
             unset($aprendiz->password2);
             
             aprendiz::setAlerta('exito','Cuenta Comprobada Correctamente');

             $aprendiz->guardar();
         } 
          
         
         //OBTENER ALERTAS
        $errores = aprendiz::getErrores();
        //ENVIO CORREO A LA VISTA CONFIRMADA
        $router->render2('auth/confirmar',[
             'errores' => $errores
        ]);
    }

    // public static function aceptar (Router $router){
    //     $aprendiz = new aprendiz;
    //     if($aprendiz->confirmado = "");
    // }

    public static function olvide(Router $router){
        $errores=[];
        
       if($_SERVER['REQUEST_METHOD'] === 'POST'){

       }
       $router->render2('auth/olvide', [
            'mensaje'=>'Olvide mi Password',
            'errores'=>$errores
       ]);
    }

    public static function recuperar(Router $router){
        $router->render2('contraseña/olvide');
    }

   
}
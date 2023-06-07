<?php
namespace Controllers;
use MVC\Router;
use Model\Admin;

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
                

                //AUTENTICAR EL USUARIO
            }
        }
        
        $router->render2('auth/login',[
            'errores' => $errores
        ]);
    }
    public static function logout(){
        session_start();
        $_SESSION =[];

        header('Location: /');
    }

    public static function olvide(Router $router){
       echo"Desde olvide";
    }

    public static function recuperar(Router $router){
        $router->render2('contraseña/olvide');
    }

   
}
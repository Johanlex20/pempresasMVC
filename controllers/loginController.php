<?php
namespace Controllers;
use MVC\Router;
use Model\Admin;
use Model\aprendiz;

class LoginController{
    public static function login(Router $router){

        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new aprendiz($_POST);

            $errores = $auth->validarLogin();
            
            if(empty($errores)){
                //VERIFICAR SI EL USUARIO EXISTE
                $aprendiz = aprendiz::where('email', $auth->email);
                
                if($aprendiz){
                    //VERIFICAR EL PASSWORD
                    if($aprendiz->comprobarPasswordAndVerificado($auth->password)){
                        //AUTENTICAR EL USUARIO

                        //LLENAR EL ARREGLO DE SESSION
                        $_SESSION['id'] = $aprendiz->id;
                        $_SESSION['nombre'] = $aprendiz->nombre;
                        $_SESSION['email'] = $aprendiz->email;
                        $_SESSION['login'] = true;

                        //REDIRECCIONAMIENTO SI ES USUARIO EMPRESA O ADMIN
                        if($aprendiz->admin === "1"){
                            $_SESSION['admin'] = $aprendiz->admin ?? null;
                            header('Location: /admin/admin');
                        }else{
                            header('Location: /login');
                        }     
                    }
                }else{
                    aprendiz::setAlerta('error', 'Usuario No Encontrado');
                }
            }
        }  
        $errores = aprendiz::getErrores();
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

    public static function confirmar(Router $router)
    {
        $errores = [];
        
        $aprendiz = new Aprendiz;
        $token = s($_GET['token']);
    
        $aprendiz = Aprendiz::where('token', $token);
    
        if (empty($aprendiz)) {
            Aprendiz::setAlerta('error', 'Token No Válido');
        } else {
            // MODIFICAR A USUARIO CONFIRMADO
            $aprendiz->confirmado = "1";
            $aprendiz->token = null;
            unset($aprendiz->password2);
            $aprendiz->guardar();    
            Aprendiz::setAlerta('exito', 'Cuenta Comprobada Correctamente');         
     
        } 
             
        // OBTENER ALERTAS
        $errores = Aprendiz::getErrores();
        
        // ENVIO CORREO A LA VISTA CONFIRMADA
        $router->render2('auth/confirmar', [
            'errores' => $errores
        ]);
    }
    

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
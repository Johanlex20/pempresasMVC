<?php
namespace Controllers;
use MVC\Router;
use Model\Admin;
use Model\aprendiz;
use Classes\Email;

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
                        $_SESSION['Idrol'] = $aprendiz->Idrol;

                        //REDIRECCIONAMIENTO SI ES USUARIO EMPRESA O ADMIN

                        if($aprendiz->Idrol === "1"){
                            $_SESSION['admin'] = $aprendiz->Idrol ?? null;
                            header('Location: /perfil/admin');
                        }elseif($aprendiz->Idrol === "2"){
                            header('Location: /perfil/empresa');
                        } else{
                            header('Location: /perfil/aprendiz');
                        }       
                    }
                }else{
                    aprendiz::setAlerta('error', 'Usuario No Encontrado');
                }
            }
        }  
        $errores = aprendiz::getErrores();
        $router->render('auth/login',[
            'errores' => $errores
        ]);
    }
    public static function mensaje (Router $router){
        $router->render('auth/mensaje');
    }
    public static function logout(){
        session_start();
        $_SESSION =[];

        header('Location: /');
    }
    public static function confirmar(Router $router){
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
        $router->render('auth/confirmar', [
            'errores' => $errores
        ]);
    }
    public static function olvide(Router $router){
        $errores=[];
        
       if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new aprendiz($_POST);
            $errores = $auth->validarEmail();
            
            if(empty($errores)){
                $aprendiz = aprendiz::where('email',$auth->email);
                if($aprendiz && $aprendiz->confirmado === "1"){

                    //GENERAR UN TOKEN
                    $aprendiz->crearToken();
                    $aprendiz->guardar();

                    //ENIVAR EL EMAIL
                    $email = new Email($aprendiz->email, $aprendiz->nombre, $aprendiz->token);

                    //ALERTA DE EXITO
                    aprendiz::setAlerta('exito','Revisa tu email');
                }else{
                    aprendiz::setAlerta('error','El Usuario no existe o no esta confirmado');
                }
            }          
       }
       $errores = aprendiz::getErrores();
       $router->render('contraseña/olvide', [
            'mensaje'=>'Olvide mi Password',
            'errores'=>$errores
       ]);
    }

    public static function recuperar(Router $router){
        $errores = [];
        $error = false;
        $token = s ($_GET['token']);

        // BUSCAR APRENDIZ POR SU TOKEN
        $aprendiz = aprendiz::where('token', $token);

        if(empty($aprendiz)){
            aprendiz::setAlerta('error', 'Token No Válido');
            $error = true;
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // LEER EL NUEVO PASSWORD Y GUARDARLO

            $password = new aprendiz($_POST);
            $errores = $password->validarPassword();

            if(empty($errores)){
                $aprendiz->password = null;
                $aprendiz->password = $password->password;
                $aprendiz->hashPassword();
                $aprendiz->token = null;

                $resultado = $aprendiz->guardar();
                
            }
        }
        $errores = aprendiz::getErrores();
        $router->render('contraseña/recuperar',[
            'errores' => $errores,
            'error' => $error
        ]);
    } 
}
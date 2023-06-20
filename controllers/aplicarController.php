<?php 
namespace Controllers;

use Model\aplicar;
use MVC\Router;
use Model\aprendiz;
use Model\Empresas;
use Model\ofertas;

class AplicarController{
    public static function consultar (Router $router){
        $aplicar = aplicar::all();
        $resultado = $_GET['resultado'] ?? null;
        //ARREGLO VACIO ALERTAS
        $errores = [];
        
        $router->render('/aplicar/consultar',[
            'aplicar' => $aplicar,
            'errores' => $errores
        ]);
    }

    public static function aplicar (Router $router){
        $aplicar = new aplicar;
        
        $aprendiz = aprendiz::all();
        // $empresa = Empresas::all();
        // $oferta = ofertas::all();

        //ARREGLO VACIO ALERTAS
        $errores = [];

        //ARREGLO CON MENSAJES DE ERROR
        $errores = aprendiz::getErrores();
        $ofertasId = $_GET['id'] ?? null;
        $aprendizId = $_SESSION['id'];

        //CREAR UNA NUEVA INSTANCIA
        $aplicar = new aplicar([
            'aprendizId' => $aprendizId,
            'ofertasId' => $ofertasId,
        ]);

            // debuguear($idOferta); BUSQUEDA DEL ID DE LA OFERTA
            // debuguear($aprendizId); BUSQUEDA DEL ID DEL APRENDIZ

            // debuguear($aplicar);
            // debuguear($errores);

            if(empty($errores)){
                $aplicar->guardar();
                aplicar::setAlerta('exito','Revisa tu email');
                header('Location: /confirmar');
                
            }

        
        
        $router->render('/aplicar/aplicar',[
            'aplicar' => $aplicar,
            'aprendiz' => $aprendiz,
            // 'empresa' => $empresa,
            // 'oferta' => $oferta,
            'errores' => $errores
        ]);
    }
}


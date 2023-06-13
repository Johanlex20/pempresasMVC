<?php
namespace Controllers;
use MVC\Router;
use Model\ofertas;
use Model\Tipoidentificacion;
use Model\programa;
use Intervention\Image\ImageManagerStatic as Image;

class OfertaController{
    public static function index (Router $router){

        $oferta = ofertas::all();
        $resultado = $_GET ['resultado'] ?? null; //envia el mensaje de creacion de usuario

        $router->render('admin/admin', [
            'oferta' => $oferta,
            'resultado' => $resultado
        ]);
    }
    public static function crear(Router $router){
        $oferta = new ofertas;
        $tipoprogramas = programa::all();
        $errores = ofertas::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //CREAR UNA NUEVA ISNTANCIA
            $oferta = new ofertas($_POST['ofertas']);
    
            //GENERAR UN NOMBRE UNICO
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
    
            if($_FILES ['ofertas']['tmp_name']['imagen'] ){
            //SETEAR LA IMAGEN
            $image = Image::make($_FILES['ofertas']['tmp_name']['imagen'])->fit(800, 600);
            $oferta->setImagen($nombreImagen);
            }
             //VALIDAR
             $errores = $oferta->validar();
    
            if(empty($errores)){ 
                
            //CREAR CARPETA
            $carpetaImagenes = '../../src/img/'; 
            if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }
                //GUARDAR LA IMAGEN EN EL SERVIDOR
                $image->save(CARPETA_IMAGENES . $nombreImagen);
    
                //GUARDAR EN LA BD
               $oferta->guardar();     
            }
        }
        $router->render('ofertas/crear' , [
            'oferta' => $oferta,
            'tipoprogramas' => $tipoprogramas,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin/admin');
        $oferta =ofertas::find($id);
        $tipoprogramas = programa::all();
        $errores = ofertas::getErrores();

        // METODO POST PARA ACTUALIZAR
        if($_SERVER['REQUEST_METHOD']==='POST'){

            //ASIGNAR LOS ATRIBUTOS
            $args = $_POST['ofertas'];

            $oferta->sincronizar($args);
            
            //VALIDACION
            $errores = $oferta->validar();
            
            //GENERAR UN NOMBRE UNICO
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

            //SUBIDA DE ARCHIVOS
            if($_FILES['ofertas']['tmp_name']['imagen']){
                //SETEAR LA IMAGEN
                $image = Image::make($_FILES['ofertas']['tmp_name']['imagen'])->fit(800, 600);
                $oferta->setImagen($nombreImagen);
                }

            //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
            if(empty($errores)){  //empty es la funcion que reviza los arreglos esten vacios
                //ALMACENAR LA IMAGEN
                $oferta->guardar();
                $image->save(CARPETA_IMAGENES . $nombreImagen);            
            }
        }

            $router->render('/ofertas/actualizar', [
                'oferta' => $oferta,
                'tipoprogramas' => $tipoprogramas,
                'errores' => $errores
            ]);
        }
    public static function consultar(Router $router){
        $oferta = ofertas::all();
        $resultado =$_GET['resultado'] ??null;

        $router->render('ofertas/consultar' , [
            'oferta' => $oferta          
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
                    $oferta = ofertas::find($id);
                    $oferta->eliminar();
                }  
            }
        }
    }
}
<?php

namespace Controllers;
use MVC\Router;
use Model\Empresas;
use Model\Tipoidentificacion;
use Intervention\Image\ImageManagerStatic as Image;


class EmpresaController{
    public static function index (Router $router){

        $empresa = Empresas::all();
        $resultado = $_GET ['resultado'] ?? null; //envia el mensaje de creacion de usuario

        $router->render('admin/admin', [
            'empresa' => $empresa,
            'resultado' => $resultado
        ]);
    }
    public static function crear(Router $router){
        $empresa = new Empresas;
        $tipoidentificacion = Tipoidentificacion::all();
        
        //ARREGLO CON MENSAJES DE ERROR
        $errores = Empresas::getErrores();

    //EJECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //CREAR UNA NUEVA ISNTANCIA
        $empresa = new Empresas($_POST['empresas']);

        //GENERAR UN NOMBRE UNICO
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

            if($_FILES['empresas']['tmp_name']['imagen']){
            //SETEAR LA IMAGEN
            $image = Image::make($_FILES['empresas']['tmp_name']['imagen'])->fit(800, 600);
            $empresa->setImagen($nombreImagen);
            }

            //VALIDAR
            $errores = $empresa->validar();

            if(empty($errores)){ 
                
            //CREAR CARPETA
            $carpetaImagenes = '../../src/img/'; 
            if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }
                //GUARDAR LA IMAGEN EN EL SERVIDOR
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                //GUARDAR EN LA BD
            $empresa->guardar();     
            }
        }
        $router->render('empresas/crear' , [
            'empresa' => $empresa,
            'tipoidentificacion' => $tipoidentificacion,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin/admin');
        $empresa =Empresas::find($id);
        $tipoidentificacion = Tipoidentificacion::all();
        $errores = Empresas::getErrores();

        // METODO POST PARA ACTUALIZAR
        if($_SERVER['REQUEST_METHOD']==='POST'){

            //ASIGNAR LOS ATRIBUTOS
            $args = $_POST['empresas'];

            $empresa->sincronizar($args);
            
            //VALIDACION
            $errores = $empresa->validar();
            
            //GENERAR UN NOMBRE UNICO
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

            //SUBIDA DE ARCHIVOS
            if($_FILES['empresas']['tmp_name']['imagen']){
                //SETEAR LA IMAGEN
                $image = Image::make($_FILES['empresas']['tmp_name']['imagen'])->fit(800, 600);
                $empresa->setImagen($nombreImagen);
                }

            //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
            if(empty($errores)){  //empty es la funcion que reviza los arreglos esten vacios
                //ALMACENAR LA IMAGEN
                $empresa->guardar();
                $image->save(CARPETA_IMAGENES . $nombreImagen);            
            }
        }

            $router->render('/empresas/actualizar', [
                'empresa' => $empresa,
                'tipoidentificacion' => $tipoidentificacion,
                'errores' => $errores
            ]);
        }
    public static function consultar(Router $router){
        $empresa = Empresas::all();
        $resultado =$_GET['resultado'] ??null;

        $router->render('empresas/consultar' , [
            'empresa' => $empresa
           
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
                    $empresa = Empresas::find($id);
                    $empresa->eliminar();
                }  
            }
        }
    }
}
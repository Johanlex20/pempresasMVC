<?php
namespace Model;

class Admin extends ActiveRecord{
    //BASE DE DATOS
    protected static $tabla = 'aprendiz';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct ($args = []){
      
        $this->id = $args['id'] ?? null;  
        $this->email = $args['email'] ?? ''; 
        $this->password = $args['password'] ?? ''; 

    }
    // public function validar(){

    //     if (!$this->email){
    //         self::$errores['error'][] = "* Debes añadir un Correo";
    //     }

    //     if (!$this->password){
    //         self::$errores['error'][] = "* Debes añadir una Contraseña";
    //     }

    //     return self::$errores;
    // }
    // public function existeUsuario(){
    //     // REVISAR SI UN USUARIO EXISTE
    //     $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email ."' LIMIT 1";

    //     $resultado = self::$db->query($query);

    //     if(!$resultado->num_rows){
    //         self::$errores['error'][] = 'El Usuario no existe';
    //         return;
    //     }
    //     return $resultado;
    // }
    // public function comprobarPassword($resultado){
    //     $aprendiz = $resultado->fetch_object();

    //     $autenticado = password_verify($this->password, $aprendiz->password);

    //     if(!$autenticado){
    //         self::$errores ['error'][] = "El Password es Incorrecto";
    //     }
    //     return $autenticado;
    // }

    // public function autenticar (){
    //     session_start();

    //     //LLENAR EL ARREGLO DE SESSION
    //     $_SESSION['aprendiz'] = $this->email;
    //     $_SESSION['login'] = true;

    //     header('Location: /admin/admin');
    // }
}
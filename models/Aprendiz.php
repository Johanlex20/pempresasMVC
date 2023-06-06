<?php
namespace Model;

class aprendiz extends ActiveRecord{
    protected static $tabla = 'aprendiz';
    protected static $columnasDB = ['id', 'nombre', 'tipoId', 'identificacion', 'tipoPrograma', 'email', 'password', 'telefono', 'creacionaprendiz','admin','confirmado','token'];

    public $id;
    public $nombre;
    public $tipoId;
    public $identificacion;
    public $tipoPrograma;
    public $email;
    public $password;
    public $telefono;
    public $creacionaprendiz;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct ($args = []){
      
        $this->id = $args['id'] ?? null;  
        $this->nombre = $args['nombre'] ?? ''; 
        $this->tipoId = $args['tipoId'] ?? ''; 
        $this->identificacion = $args['identificacion'] ?? ''; 
        $this->tipoPrograma = $args['tipoPrograma'] ?? ''; 
        $this->email = $args['email'] ?? ''; 
        $this->password = $args['password'] ?? ''; 
        $this->telefono = $args['telefono'] ?? ''; 
        $this->creacionaprendiz = date('Y/m/d'); 
        $this->admin = $args ['admin'] ?? null;
        $this->confirmado = $args ['confirmado'] ?? null;
        $this->token = $args ['token'] ?? '';
    }

    public function validar(){
        if (!$this->nombre){
            self::$errores[] = "* Debes añadir un Nombre";
        }
        if (!$this->tipoId){
            self::$errores[] = "* Tipo de Identificacion es obligatorio";
        }
        if (!$this->identificacion){
            self::$errores[] = "* Debes añadir un Numero de Identificacion";
         }
        if (!$this->tipoPrograma){
            self::$errores[] = "* Elige un Programa";
        }
        if (!$this->email){
            self::$errores[] = "* Debes añadir un Correo";
        }
        if (!$this->password){
            self::$errores[] = "* Debes añadir una Contraseña";
        }
        if (strlen($this->password) < 6){
            self::$errores[] = "* El Password debe contener al menos 6 caracteres";
        }
        if (!$this->telefono){
            self::$errores[] = "* Debes añadir un Telefono";
        }
        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[] = "* Formato telefono no Válido";
        }

        return self::$errores;
    }

    //REVISA SI EL USUARIO YA EXISTE
    public function existeUsuario(){
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows){
            self::$errores [] = " El Usuario ya esta registrado ";
        }
        return $resultado;
    }

    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    
}
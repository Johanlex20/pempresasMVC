<?php
namespace Model;

class aprendiz extends ActiveRecord{
    protected static $tabla = 'aprendiz';
    protected static $columnasDB = ['id', 'nombre', 'tipoId', 'identificacion', 'tipoPrograma', 'email', 'password', 'telefono', 'creacionaprendiz','Idrol','confirmado','token'];

    public $id;
    public $nombre;
    public $tipoId;
    public $identificacion;
    public $tipoPrograma;
    public $email;
    public $password;
    public $telefono;
    public $creacionaprendiz;
    public $Idrol;
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
        $this->password2 = $args['password2'] ?? null;
        $this->telefono = $args['telefono'] ?? ''; 
        $this->creacionaprendiz = date('Y/m/d'); 
        $this->Idrol = $args ['Idrol'] ?? '' ;
        $this->confirmado = $args ['confirmado'] ?? '';
        $this->token = $args ['token'] ?? '';
    }

    public function validar(){
        if (!$this->nombre){
            self::$errores['error'][] = "* Debes añadir un Nombre";
        }
        if (!$this->tipoId){
            self::$errores['error'][] = "* Tipo de Identificacion es obligatorio";
        }
        if (!$this->identificacion){
            self::$errores['error'][] = "* Debes añadir un Numero de Identificacion";
         }
        if (!$this->tipoPrograma){
            self::$errores['error'][] = "* Elige un Programa";
        }
        if (!$this->email){
            self::$errores['error'][] = "* Debes añadir un Correo";
        }
        if (!$this->password){
            self::$errores['error'][] = "* Debes añadir una Contraseña";
        }
        if (strlen($this->password) < 6){
            self::$errores['error'][] = "* El Password debe contener al menos 6 caracteres";
        }
        if (strlen($this->password != $this->password2)){
            self::$errores['error'][] = "* Las Contraseñas son diferentes";
        }
        if (!$this->telefono){
            self::$errores['error'][] = "* Debes añadir un Telefono";
        }
        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores['error'][] = "* Formato telefono no Válido";
        }

        return self::$errores;
    }

    public function validarLogin(){
        if (!$this->email){
            self::$errores['error'][] = "* Debes añadir un Correo";
        }

        if (!$this->password){
            self::$errores['error'][] = "* Debes añadir una Contraseña";
        }

        return self::$errores;
    }

    public function validarEmail(){
        if (!$this->email){
            self::$errores['error'][] = "* Debes añadir un Correo";
        }
        return self::$errores;
    }
    public function validarPassword(){
        if(!$this->password){
            self::$errores['error'][] = 'La Contraseña es obligatoria';
        }
        if (strlen($this->password) < 6){
            self::$errores['error'][] = 'La Contraseña debe tener al menos 6 caracteres';
        }
        return self::$errores;
    }

    //REVISA SI EL USUARIO YA EXISTE
    public function existeUsuario(){
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows){
            self::$errores ['error'][]= " El Usuario ya esta registrado ";
        }
        return $resultado;
    }
    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
    public function crearToken(){
        $this->token = uniqid();
    }

    public function comprobarPasswordAndVerificado($password){
        $resultado = password_verify($password, $this->password);
        if(!$resultado || !$this->confirmado){
            self::$errores['error'][] = 'Password Incorrecto o tu cuenta no ha sido confirmada';
        }else{
            return true;
        }
    }
    
}
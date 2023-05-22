<?php
namespace Model;

class aprendiz extends ActiveRecord{
    protected static $tabla = 'aprendiz';
    protected static $columnasDB = ['id', 'nombre', 'tipoId', 'identificacion', 'tipoPrograma', 'email', 'password', 'telefono', 'creacionaprendiz'];

    public $id;
    public $nombre;
    public $tipoId;
    public $identificacion;
    public $tipoPrograma;
    public $email;
    public $password;
    public $telefono;
    public $creacionaprendiz;

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
        if (!$this->telefono){
            self::$errores[] = "* Debes añadir un Telefono";
        }
        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[] = "* Formato telefono no Válido";
        }

        return self::$errores;
    }

}
<?php
namespace Model;

class Tipoidentificacion extends ActiveRecord{
    protected static $tabla = 'tipoidentificacion';
    protected static $columnasDB = ['id', 'tipoId'];

    public $id;
    public $tipoId;

    public function __construct ($args = []){
        //??''= En caso de que no este lleno se agrega un strim vacío
        $this->id = $args['id'] ?? null;  
        $this->tipoId = $args['tipoId'] ?? ''; 
    }

    public function validar(){

        if (!$this->tipoId){
            self::$errores[] = "* El tipo de identificacion es obligatorio";
        }

        return self::$errores;
    }
}
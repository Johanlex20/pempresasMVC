<?php
namespace Model;

class programa extends ActiveRecord{
    protected static $tabla = 'programa';
    protected static $columnasDB = ['id', 'tipoPrograma', 'moda_prog', 'tipo_form_prog'];

    public $id;
    public $tipoPrograma;
    public $moda_prog;
    public $tipo_form_prog;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->tipoPrograma = $args['tipoPrograma'] ?? '';
        $this->moda_prog = $args['moda_prog'] ?? '';
        $this->tipo_form_prog = $args['tipo_form_prog'] ?? '';  
    }  

    public function validar(){

        if (!$this->tipoPrograma){
            self::$errores[] = "* El tipo de programa es obligatorio";
        }
        if (!$this->moda_prog){
            self::$errores[] = "* La modalidad del programa es obligatoria";
        }
        if (!$this->tipo_form_prog){
            self::$errores[] = "* El tipo de formacion del programa es obligatoria";
        }
        

        return self::$errores;
    }  
}


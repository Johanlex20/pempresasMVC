<?php
namespace Model;

use DateTime;

class aplicar extends ActiveRecord{
    protected static $tabla = 'aplicaciones';
    protected static $columnasDB = ['id','hora','fecha','aprendizId','ofertasId'];

    public $id;
    public $hora;
    public $fecha;
    public $aprendizId;
    // public $empresasId;
    public $ofertasId;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->hora = (new DateTime())->format('Y-m-d H:i:s');
        $this->fecha = date('Y/m/d');
        $this->aprendizId = $args['aprendizId'] ?? '';
        // $this->empresasId = $args['empresasId'] ?? '0';
        $this->ofertasId = $args['ofertasId'] ?? '';
    }

    public function validar(){
        if (!$this->hora){
            self::$errores['error'][] = "* Hora no ingresada";
        }
        if (!$this->fecha){
            self::$errores['error'][] = "* Fecha no ingresada";
        }
        return self::$errores;
    }

}
<?php
require __DIR__ . '/../vendor/autoload.php';//carga automatica de archivos funciones clases
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'funciones.php';//funciones
require 'config/database.php';//conexion a base de datos


//CONEXION A LA BASE DE DATOS
$db = conectarDB();
use Model\ActiveRecord;
ActiveRecord::setDB($db);




<?php

namespace models;

class Aplicacion {    
    public $nombre;
    public $direccion;
    public $dueno;
    public $run;
    public $telefono;
    private static $instance = null;

    
    private function __construct(){
    }

    
    public static function Instance(){
        if (!isset(Aplicacion::$instance)) {
            Aplicacion::$instance = new Aplicacion();
        }
        return Aplicacion::$instance;
    }  

    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    
    public function getDueno(){
        return $this->dueno;
    }

    public function setDueno($dueno){
        $this->dueno = $dueno;
    }

    public function mostrar(){
        return json_encode(array(
            'Nombre'=>$this->getNombre(),
            'Dueno'=>$this->getDueno()
        ),JSON_PRETTY_PRINT);
    }


}
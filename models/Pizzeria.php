<?php

namespace models;


class Pizzeria {    
    public $nombre;
    public $direccion;
    public $dueno;
    public $run;
    public $telefono;
    private static $instance = null;

    
    private function __construct(){
    }

    
    public static function Instance(){
        if (!isset(Pizzeria::$instance)) {
            Pizzeria::$instance = new Pizzeria();
        }
        return Pizzeria::$instance;
    }  




    public function mostrar(){
        return json_encode(array(
            'Nombre'=>$this->getNombre(),
            'Direccion'=>$this->getDireccion(),
            'Dueno'=>$this->getDueno(),
            'RUN'=>$this->getRun(),
            'Telefono'=>$this->getTelefono(),
       
        ),JSON_PRETTY_PRINT);
    }

    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    
    public function getDueno(){
        return $this->dueno;
    }

    public function setDueno($dueno){
        $this->dueno = $dueno;
    }

    public function getRun(){
        return $this->run;
    }
    
    public function setRun($run){
        $this->run = $run;
    }

    public function getTelefono(){
        return $this->telefono;
    }
    
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }





}
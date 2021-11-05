<?php

namespace models;

abstract class Pago {
    public $monto;    

    
    public function __construct($monto){
        $this->monto=$monto;
    }
    
    
    public function getMonto(){
        return $this->monto;
    }

    abstract public function mostrar();

}
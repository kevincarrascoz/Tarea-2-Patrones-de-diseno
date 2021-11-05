<?php

namespace models;

require_once 'Pago.php';  

class Tarjeta extends Pago {
    public $numero;
    public $caducidad;
    
    public function __construct($monto, $numero, $caducidad){
        parent::__construct($monto);
        $this->numero=$numero;
        $this->caducidad=$caducidad;          
    }
    
    
    public function getNumero(){
        return $this->numero;
    }
    
    
    public function getCaducidad(){
        return $this->caducidad;
    }
    
   

    public function mostrar(){
        return json_encode(array(
            'Monto_Dinero' => $this->getMonto(),
            'Numero_Tarjeta' => $this->getNumero(),
            'Caducidad_Tarjeta' => $this->getCaducidad()
        ) ,JSON_PRETTY_PRINT);
    }   


}
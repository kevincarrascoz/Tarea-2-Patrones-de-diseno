<?php

namespace models;

require_once 'Pago.php';

class Efectivo extends Pago {
    public $moneda;    

    public function __construct($monto, $moneda){
        parent::__construct($monto);
        $this->moneda = $moneda;
    }
    
    
    public function getMoneda(){
        return $this->moneda;
    }
    


    public function mostrar(){
        return json_encode(array(
            'Monto'=>parent::getMonto(),
            'Moneda'=>$this->getMoneda()
        ) ,JSON_PRETTY_PRINT);
    }

}
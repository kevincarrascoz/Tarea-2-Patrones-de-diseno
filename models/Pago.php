<?php
namespace models;



abstract class Pago {
 
    public $importe;    

        
    /**
     * __construct
     *
     * @param  float $importe
     * @return void
     */
    public function __construct($importe){
        $this->importe = $importe;
    }
    
    /**
     * getImporte
     * devuelve el valor asignado a importe
     * @return float
     */
    public function getImporte(){
        return $this->importe;
    }

}
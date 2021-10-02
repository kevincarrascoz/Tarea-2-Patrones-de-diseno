<?php
namespace models;

require_once "Mostrar.php";
use models\Mostrar;

abstract class Pago implements Mostrar {
 
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

        
    abstract public function mostrar();

    abstract public function serializar();

}
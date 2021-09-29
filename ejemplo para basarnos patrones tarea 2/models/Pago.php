<?php
namespace models;

require_once "Mostrable.php";
use models\Mostrable;

abstract class Pago implements Mostrable {
    /**
     * @var float
     */
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
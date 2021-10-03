<?php
namespace models;
require_once 'Pago.php';

class Efectivo extends Pago {
    
    public $tipoMoneda;
     

    /**
     * __construct
     * implementacion del constructor
     * @param  float $importe
     * @param  string $tipoMoneda
     * @return void
     */
    public function __construct($importe,$tipoMoneda){
        parent::__construct($importe);
        $this->tipoMoneda=$tipoMoneda;
    }
    
    /**
     * getTipoMoneda
     * devuelve el tipo de moneda
     * @return string
     */
    public function getTipoMoneda(){
        return $this->tipoMoneda;
    }

        
    public function mostrar(){
        return json_encode(array(
            'importe' => parent::getImporte(),
            'tipo_moneda' => $this->getTipoMoneda()
        ), JSON_PRETTY_PRINT);
    }


}
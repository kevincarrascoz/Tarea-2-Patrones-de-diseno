<?php
namespace models;
require_once 'Pago.php';

  

class Tarjeta extends Pago {

    public $numero;
    public $caducidad;
    public $tipo;
    public $aprobado=false;
    
    /**
     * __construct
     * @param  float $importe
     * @param  int $numero
     * @param  string $caducidad
     * @param  Tarjeta $tipo este puede ser Visa o Mastercard
     * @return void
     */
    public function __construct($importe,$numero,$caducidad,$tipoTarjeta){
        parent::__construct($importe);
        $this->numero=$numero;
        $this->caducidad=$caducidad;
        if($tipoTarjeta=='Visa' || $tipoTarjeta=='Mastercard'){
                $this->tipo=$tipoTarjeta;
        }else{
            exit("<br><b>el tipo de tarjeta ingresado no es valido");
    }      
    }
    
    //entrega el numero de la tarjeta
    public function getNumero(){
        return $this->numero;
    }
    
    //entrega la fecha de caducidad de la tarjeta
    public function getCaducidad(){
        return $this->caducidad;
    }
    
    //entrega el tipo de tarjeta Visa o Mastercard
    public function getTipo(){
        return $this->tipo;
    }
        
    //autoriza la transaccion
    public function autorizar(){
        $this->aprobado = true;
    }
    
    //devuelve el estado de la transaccion si fue aprobada o no
    public function getAprobado(){
        return $this->aprobado;
    }

    
    public function mostrar(){
        return json_encode(array(
            'importe'=>parent::getImporte(),
            'numero'=>$this->getNumero(),
            'caducidad'=>$this->getCaducidad(),
            'tipo'=>$this->getTipo(),
            'estado_aprobacion'=>$this->getAprobado()
        ), JSON_PRETTY_PRINT);
    }

  
    

}


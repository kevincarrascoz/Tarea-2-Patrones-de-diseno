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
     * implementacion del constructor, si el string ingresado para el parametro de tarjeta es distinto a Visa y Mastercard, se finaliza la ejecucion
     * @param  float $importe
     * @param  int $numero
     * @param  string $caducidad
     * @param  Tarjeta $tipo
     * @return void
     */
    public function __construct($importe,$numero,$caducidad,$tipot){
        parent::__construct($importe);
        $this->numero=$numero;
        $this->caducidad=$caducidad;
        if($tipot=='Visa' || $tipot=='Mastercard'){
                $this->tipo=$tipot;
        }
        if($tipot!='Visa' && $tipot!='Mastercard'){
            exit("<br><b>el tipo de tarjeta ingresado no es valido, ingresado: $tipot");
    }      
    }
    
    /**
     * getNumero
     *
     * @return int
     */
    public function getNumero(){
        return $this->numero;
    }
    
    /**
     * getCaducidad
     * devuelve la fecha de caducidad de la tarjeta
     * @return string
     */
    public function getCaducidad(){
        return $this->caducidad;
    }
    
    /**
     * getTipo
     * devuelve el tipo de tarjeta
     * @return Tarjeta
     */
    public function getTipo(){
        return $this->tipo;
    }
        
    /**
     * autorizar
     *cambia el valor del atributo booleano 'aprobado' a verdadero indicando que se aprobo la transacción
     * @return void
     */
    public function autorizar(){
        $this->aprobado = true;
    }
    
    /**
     * getAprobado
     * devuelve el valor del booleeano aprobado
     * @return boolean
     */
    public function getAprobado(){
        return $this->aprobado;
    }

    
    public function mostrar(){
        return json_encode($this->serializar(), JSON_PRETTY_PRINT);
    }

    public function serializar() {
        return array(
            'importe'=>parent::getImporte(),
            'numero'=>$this->getNumero(),
            'caducidad'=>$this->getCaducidad(),
            'tipo'=>$this->getTipo(),
            'estado_aprobacion'=>$this->getAprobado()
        );
    }

}


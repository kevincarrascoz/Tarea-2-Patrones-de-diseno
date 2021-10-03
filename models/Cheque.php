<?php
namespace models;
require_once 'Pago.php';

class Cheque extends Pago {

    public $nombre;
    public $banco;
    public $aprobado = false;

    
    /**
     * __construct
     * implementacion del constructor
     * @param  float $importe
     * @param  string $nombre
     * @param  string $banco
     * @return void
     */
    public function __construct($importe, $nombre, $banco){
        parent::__construct($importe);
        $this->nombre = $nombre;
        $this->banco = $banco;
    }
    
    /**
     * getNombre
     * devuelve el nombre asignado al cheque
     * @return string
     */
    public function getNombre(){
        return $this->nombre;
    }
    
    /**
     * getBanco
     * devuelve el nombre del banco
     * @return string
     */
    public function getBanco(){
        return $this->banco;
    }
    
    /**
     * autorizar
     * cambia el valor del atributo booleano 'aprobado' a verdadero indicando que se aprobo la transacción
     * @return void
     */
    public function autorizar(){
        $this->aprobado=true;
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
        return json_encode(array(
            'importe' => parent::getImporte(),
            'nombre' => $this->getNombre(),
            'banco' => $this->getBanco(),
            'estado_aprobacion' => $this->getAprobado()
            
        ), JSON_PRETTY_PRINT);
    }

    

}
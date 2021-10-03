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
    
    //devuelve el importe
    public function getImporte(){
        return $this->importe;
    }


    //lista de pagos relacionados a el pedido
    public function getListaPagos()
    {
        return json_encode($this->listaPagos);
    }

    //asigna la lista de pagos a un pedido
    public function setListaPagos($listaPagos)
    {
        $this->listaPagos = $listaPagos;
    }

}
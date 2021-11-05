<?php

namespace models;

require_once "Pago.php";
require_once "Cliente.php";
require_once "Pedido.php";
require_once "EstadoPedido.php";
use models\Pedido;
use models\Pago;
use models\Cliente;
use models\EstadoPedido;

class ClienteCredito extends Cliente{
    public $nombre;
    public $rut;
    public $correo;
    public $listaPedidos;

    
    
    public function __construct($nombre, $rut, $correo) 
    {
        $this->nombre = $nombre;
        $this->rut = $rut;
        $this->correo = $correo;
        $this->listaPedidos = array();
    }
   

    public function solicitar2() {
        $pedido = new Pedido(date("m-d-Y"));
        array_push($this->listaPedidos, $pedido);
        return $pedido;
    }
    







   

   

    
}
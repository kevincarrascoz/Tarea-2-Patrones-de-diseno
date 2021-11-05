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

abstract class Cliente {
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
   
    protected abstract function solicitar2();
    
    public function getNombre(){
        return $this->nombre;
    }

    public function getRut(){
        return $this->rut;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getListaPedidos(){
        return $this->listaPedidos;
    }
    /* el cliente termina de ordenar el pedido pero todavia no lo paga*/
    public function terminarPedido() {
        $this->estado = EstadoPedido::por_pagar();
    }

    protected abstract function mostrar2();

    protected abstract function mostrar();

    
}
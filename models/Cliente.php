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

class Cliente {
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
   

    public function solicitar() {
        $pedido = new Pedido(date("m-d-Y"));
        array_push($this->listaPedidos, $pedido);
        return $pedido;
    }
    
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

    public function terminarPedido() {
        $this->estado = EstadoPedido::por_pagar();
    }

    /*mostrar se separon en 2 para poder imprimir el array con los datos del pedido*/
    public function mostrar2() {
        $funcionAux = function($t) {
            return $t->mostrar2();
        };
        return array(
            'Nombre'=>$this->getNombre(),
            'Rut'=>$this->getRut(),
            'Correo'=>$this->getCorreo(),
            'Pedidos'=> array_map($funcionAux, $this->getListaPedidos())
        );
    }

    public function mostrar(){
        return json_encode($this->mostrar2(),JSON_PRETTY_PRINT);
    }

    
}
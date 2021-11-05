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

class ClienteEfectivo extends Cliente{
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
    
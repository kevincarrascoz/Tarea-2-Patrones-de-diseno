<?php

namespace models;

require_once "Pago.php";
require_once "Cliente.php";
require_once "Pizza.php";
require_once "EstadoPedido.php";

use models\Pizza;
use models\Cliente;
use models\Pago;
use models\EstadoPedido;

class Pedido {
    public $fecha;
    public $estado;
    public $pizzas;
    public $listaPagos;

    
    public function __construct($fecha)
    {
        $this->fecha = $fecha;
        $this->estado = EstadoPedido::nuevo();
        $this->pizzas = array();   
    }
    
    public function nuevaPizza() {
        $this->estado = EstadoPedido::preparando();
        $pizza = new Pizza();
        array_push($this->pizzas, $pizza);
        return $pizza;
    }

        
    public function getPago()
    {
        return json_encode($this->listaPagos);
    }
    
   
    public function setPago($listaPagos)
    {
        $this->listaPagos = $listaPagos;
    }
    

    public function pagar($listaPagos) {

        $this->estado = EstadoPedido::pagado();
        $this->setPago($listaPagos);
    }

    public function terminarPedido() {
        $this->estado = EstadoPedido::por_pagar();
    }

    public function serializar() {
        $s = function($t) {
            return $t->serializar();
        };
        return array(
            'Fecha_Pedido' => $this->fecha,
            'Estado_Pedido' => $s($this->estado),
            'Pizza' => array_map($s, $this->pizzas)
        );
    }

    public function mostrar() {
        return json_encode($this->serializar(), JSON_PRETTY_PRINT);
    } 
    
}
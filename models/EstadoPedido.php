<?php

namespace models;


class EstadoPedido {
    static private $nuevo = null;
    static private $preparando = null;
    static private $por_pagar = null;
    static private $pagado = null;
    static private $entregado = null;

    private $name;
    
    private function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    
    static public function nuevo() {
        if (!EstadoPedido::$nuevo) {
            EstadoPedido::$nuevo = new EstadoPedido("nuevo");
        }
        return EstadoPedido::$nuevo;
    }

    
    static public function preparando() {
        if (!EstadoPedido::$preparando) {
            EstadoPedido::$preparando = new EstadoPedido("preparando");
        }
        return EstadoPedido::$preparando;
    }

    
    static public function por_pagar() {
        if (!EstadoPedido::$por_pagar) {
            EstadoPedido::$por_pagar = new EstadoPedido("por_pagar");
        }
        return EstadoPedido::$por_pagar;
    }

    
    static public function pagado() {
        if (!EstadoPedido::$pagado) {
            EstadoPedido::$pagado = new EstadoPedido("pagado");
        }
        return EstadoPedido::$pagado;
    }

    
    static public function entregado() {
        if (!EstadoPedido::$entregado) {
            EstadoPedido::$entregado = new EstadoPedido("entregado");
        }
        return EstadoPedido::$entregado;
    }


    public function mostrar() {
        return json_encode($this->mostrar2());
    }

    public function mostrar2() {
        return $this->name;
    }
}

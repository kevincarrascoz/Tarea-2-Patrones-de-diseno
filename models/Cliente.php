<?php

namespace models;

require_once "Pedido.php";
require_once "Estados.php";
use models\Pedido;
use models\Estados;

/**
 * Cliente
 * 
 * Un cliente puede hacer pedidos, cotizar y pagar.
 */
class Cliente {

    public $nombre;
    public $direccion;
    public $pedidos;

    /**
     * __construct
     * 
     * @param string $nombre
     * @param string $direccion
     * @return void
     */
    public function __construct($nombre, $direccion) 
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->pedidos = array();
    }

    /**
     * solicitar
     * 
     * Solicita un pedido desde este cliente
     * @param array $orden
     * @return Pedido
     */
    public function solicitar($orden) {
        $p = new Pedido(strtotime("now"), Estados::pendiente(), $orden);
        array_push($this->pedidos, $p);
        return $p;
    }

    public function mostrar() {
        return json_encode($this->serializar(), JSON_PRETTY_PRINT);
    }

    public function serializar() {
        $get_serial = function($e) {
            return $e->serializer();
        };
        
        return array(
            "nombre" => $this->nombre,
            "direccion" => $this->direccion,
            "pedidos" => array_map($get_serial, $this->pedidos)
        );
    }
}
<?php

namespace models;

require_once "Mostrable.php";
require_once "DetalleOrden.php";
use models\Mostrable;
use models\DetalleOrden;

class Pedido implements Mostrable {
    /**
     * @var int cuando se realizo el pedido en unix timestamp
     */
    public $fecha;

    /**
     * @var Estados
     */
    public $estado;

    /**
     * Todas los detalles de ordenes correspondientes
     * a este pedido
     * @var array
     */
    public $ordenes;

    /**
     * __construct
     * @param int $fecha
     * @param Estados $estado
     */
    public function __construct($fecha, $estado, $orden)
    {
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->ordenes = array();

        foreach ($orden as $producto => $cantidad) {
            $pr = Producto::productoPorNombre($producto);
            $o = new DetalleOrden($cantidad, $pr->precio, 0.05, $pr);
            array_push($this->ordenes, $o);
        }
    }

    /**
     * @return float
     */
    public function calcularTotal() {
        $s = 0.0;
        foreach ($this->ordenes as &$value) {
            $s += $value->calcularSubTotal();
        }
        unset($value);

        return $s;
    }

    public function mostrar() {
        return json_encode($this->serializar(), JSON_PRETTY_PRINT);
    }

    public function serializar()
    {
        $f = function($x) {
            return $x->serializar();
        };
        return array(
            "fecha" => date("Y-m-d H:i:s", $this->fecha),
            "estado" => $this->estado->serializar(),
            "ordenes" => array_map($f, $this->ordenes)
        );
    }
}
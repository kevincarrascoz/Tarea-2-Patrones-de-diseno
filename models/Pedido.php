<?php

namespace models;

require_once "DetalleOrden.php";
use models\DetalleOrden;

class Pedido {

    public $fecha;
    public $estado;
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
            $productoPedido = Producto::productoPorNombre($producto);
            $nuevaOrden = new DetalleOrden($cantidad, $productoPedido->precio, 0.19, $productoPedido);
            array_push($this->ordenes, $nuevaOrden);
        }
    }


    public function calcularSubTotal() {

        $auxiliar = 0.0; // auxiliar para guardar el subtotal del pedido
        foreach ($this->ordenes as $value) {
            $auxiliar += $value->calcularSubTotal();
        }
        unset($value);

        return $auxiliar;
    }

    public function calcularTotal() {
        $impuesto = 1.19;
        $auxiliar = 0.0; // auxiliar para guardar el subtotal del pedido
        foreach ($this->ordenes as $value) {
            $auxiliar += $value->calcularSubTotal();
        }
        unset($value);

        return $auxiliar*$impuesto;
    }



    public function mostrar() {
        $funcionListar = function($auxParaReturn) {
            return $auxParaReturn->mostrar();
        };
        return json_encode(array(
            "Fecha" => date("Y-m-d H:i:s", $this->fecha),
            "Estado" => $this->estado->mostrar(),
            "Ordenes" => array($funcionListar, $this->ordenes)
        ), JSON_PRETTY_PRINT);
    }

}
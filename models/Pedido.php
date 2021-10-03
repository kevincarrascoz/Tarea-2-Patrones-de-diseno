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
        return json_encode($this->serializar(), JSON_PRETTY_PRINT);
    }

    public function serializar()
    {   //funcion para poder listar las ordenes
        $funcionListar = function($auxParaReturn) {
            return $auxParaReturn->serializar();
        };
        return array(
            "Fecha" => date("Y-m-d H:i:s", $this->fecha),
            "Estado" => $this->estado->mostrar(),
            "Ordenes" => array_map($funcionListar, $this->ordenes)
        );
    }
}
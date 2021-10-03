<?php

namespace models;


class DetalleOrden  {

    public $cantidad;
    public $precio;
    public $impuesto;
    public $producto;

    /**
     * __construct
     * 
     * @param int $cantidad
     * @param float $precio
     * @param float $impuesto porcentaje de impuesto %
     * @param Producto $producto
     * @return void
     */
    public function __construct($cantidad, $precio, $impuesto, $producto)
    {
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->impuesto = $impuesto;    
        $this->producto = $producto;
    }


    /**
     * calcularSubTotal
     * 
     * Calcula el total a pagar por esta orden
     * @return float
     */
    public function calcularSubTotal() {
        return $this->cantidad * $this->precio;
    }


    public function mostrar() {
        return json_encode(array(
            "cantidad" => $this->cantidad,
            "precio" => $this->precio,
            "impuesto" => $this->impuesto,
            "producto" => $this->producto->mostrar()
        ), JSON_PRETTY_PRINT);
    }


}
<?php

namespace models;


class Producto {

    static private $productos = array();

 
    public $producto;
    public $peso;
    public $precio;
    public $stock;

    /**
     * __construct
     * 
     * @param string $producto nombre del producto
     * @param float $peso peso del producto en kilogramos
     * @param float $precio precio por unidad de cada producto, agregamos este que no estaba en el diagrama
     * @param int $stock_ini stock inicial del producto
     */
    private function __construct($producto, $peso, $precio, $stock_ini) {
        $this->producto = $producto;
        $this->peso = $peso;
        $this->precio = $precio;
        $this->stock = $stock_ini;
    }

    static public function nuevoProducto($producto, $peso, $precio, $stock_ini) {
        $ordenProducto = new self($producto, $peso, $precio, $stock_ini);
        array_push(self::$productos, $ordenProducto);
        return $ordenProducto;
    }

    /**

     * Obtiene un producto por su nombre
     * @param string $nombre
     * @return Producto
     */
    static public function productoPorNombre($nombre) {
        foreach (self::$productos as $value) {
            if ($value->producto == $nombre) {
                return $value;
            }
        }
        return null;
    }

    /**
     * Cotiza el precio de $cantidad unidades,
     * si el stock no alcanza, se regresa el precio
     * como si se cotizara $stock unidades.
     * @param int $cantidad 
     * @return float
     */
    public function precioCantidad($cantidad) {
        return $this->precio * min($this->stock, $cantidad);
    }

    //obtiene el peso de un producto
    public function obtenerPeso() {
        return $this->peso;
    }

    //muestra la informacion de un produto
    public function mostrar() {
        return json_encode(array(
            "producto" => $this->producto,
            "peso" => $this->peso,
            "precio" => $this->precio,
            "stock" => $this->stock
        ), JSON_PRETTY_PRINT);
    }

}
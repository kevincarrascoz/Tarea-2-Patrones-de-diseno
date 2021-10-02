<?php

namespace models;

require_once "Mostrar.php";
use models\Mostrar;

/**
 * Producto
 * 
 * Representa un producto en stock.
 */
class Producto implements Mostrar {

    static private $productos = array();

 
    public $producto;
    public $peso;
    public $precio;
    public $stock;

    /**
     * __construct
     * 
     * @param string $producto nombre
     * @param float $peso
     * @param float $precio por unidad
     * @param int $stock_inicial
     */
    private function __construct($producto, $peso, $precio, $stock_inicial) {
        $this->producto = $producto;
        $this->peso = $peso;
        $this->precio = $precio;
        $this->stock = $stock_inicial;
    }

    static public function nuevoProducto($producto, $peso, $precio, $stock_inicial) {
        $o = new self($producto, $peso, $precio, $stock_inicial);
        array_push(self::$productos, $o);
        return $o;
    }

    /**
     * productoPorNombre
     * 
     * Obtiene un producto por nombre
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
     * precioCantidad
     * 
     * Cotiza el precio de $cantidad unidades,
     * si el stock no alcanza, se regresa el precio
     * como si se cotizara $stock unidades.
     * @param int $cantidad 
     * @return float
     */
    public function precioCantidad($cantidad) {
        return $this->precio * min($this->stock, $cantidad);
    }

    /**
     * puedeSuplir
     * 
     * Regresa verdadero si hay stock para suplir
     * una demanda $cantidad
     * 
     * @param int $cantidad
     * @return boolean
     */
    public function puedeSuplir($cantidad) {
        return $this->stock >= $cantidad;
    }

    public function obtenerPeso() {
        return $this->peso;
    }


    public function mostrar() {
        return json_encode($this->serializar(), JSON_PRETTY_PRINT);
    }


    public function serializar() {
        return array(
            "producto" => $this->producto,
            "peso" => $this->peso,
            "precio" => $this->precio,
            "stock" => $this->stock
        );
    }
}
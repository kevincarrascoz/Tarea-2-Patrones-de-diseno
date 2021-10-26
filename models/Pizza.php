<?php

namespace models;


class Pizza {

    static private $pizza = array();

 
    public $tamaño;
    public $masa;
    public $queso;
    public $ingredientes;

    /**
     * __construct
     * 
     * @param tamañoPizza $tamaño tamaño de la pizza
     * @param tipoMasa $masa tipo de masa que tendrá la pizza
     * @param cantidadQueso $queso cantidad de queso que tendrá la pizza
     * @param listaIngredientes $ingredientes ingredientes que serán agregados a la pizza
     */
    private function __construct($tamaño, $masa, $queso, $ingredientes) {
        $this->tamaño = $tamaño;
        $this->masa = $masa;
        $this->queso = $queso;
        $this->ingredientes = $ingredientes;
    }

    static public function nuevaPizza($tamaño, $masa, $queso, $ingredientes) {
        $ordenProducto = new self($tamaño, $masa, $queso, $ingredientes);
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

    //entrega el precio total de un producto en particular dependiendo de la cantidad especifica del pedido
    public function precioCantidad($cantidad) {
        return $this->precio *  $cantidad;
    }

    //obtiene el peso de un producto
    public function obtenerPeso() {
        return $this->peso;
    }

    //obtiene el nombre de un producto
    public function obtenerNombre() {
        return $this->producto;
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
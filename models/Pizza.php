<?php

namespace models;

class Pizza  {
    private $ingredientes;
    private $tamano;
    private $cantidad_queso;
    private $tipo_masa;
    private $terminado;

    public function __construct() {
        $this->ingredientes = array();
        $this->terminado = false;
    }

    public function setIngrediente($ingrediente) {
        array_push($this->ingredientes, $ingrediente);
        return $this;
    }

    public function setTamano($tamano) {
        $this->tamano = $tamano;
        return $this->tamano;
    }

    public function setCantidadQueso($cantidad) {
        $this->cantidad_queso = $cantidad;
        return $this->cantidad_queso;
    }

    public function setTipoMasa($tipo) {
        $this->tipo_masa = $tipo;
        return $this->tipo_masa;
    }

    
    public function estaTerminada() {
        return $this->terminado;
    }

    public function terminar() {
        $this->terminado = true;
        return $this->terminado;
    }

    public function editar() {
        $this->terminado = false;
        return $this->terminado;
    }

    public function mostrar() {
        return json_encode(array(
            "Ingredientes" => $this->ingredientes,
            "Tamano" => $this->tamano,
            "cantidad queso" => $this->cantidad_queso,
            "Tipo masa" => $this->tipo_masa,
            "Terminado" => $this->terminado
        ), JSON_PRETTY_PRINT);
    }

}
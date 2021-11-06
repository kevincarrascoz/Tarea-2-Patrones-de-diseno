<?php

namespace models;

class Pizza {
    private $ingredientes;
    private $tamano;
    private $cantidad_queso;
    private $tipo_masa;
    private $terminado;

    public function __construct() {
        $this->ingredientes = array();
        $this->terminado = false;
    }


    public function agregarIngrediente($ingrediente) {
        array_push($this->ingredientes, $ingrediente);
        return $this;
    }

    public function asignarTamano($tamano) {
        $this->tamano = $tamano;
        return $this->tamano;
    }

    public function asignarCantidadQueso($cantidad) {
        $this->cantidad_queso = $cantidad;
        return $this->cantidad_queso;
    }

    public function asignarTipoMasa($tipo) {
        $this->tipo_masa = $tipo;
        return $this->tipo_masa;
    }

    
    public function estaTerminada() {
        return $this->terminado;
    }

    public function terminar() {
        return $this->terminado = true;
    }

    public function editar() {
        $this->terminado = false;
        return $this;
    }

    public function mostrar() {
        return json_encode($this->mostrar2());
    }

    public function mostrar2() {
        return array(
            "ingredientes" => $this->ingredientes,
            "tamano" => $this->tamano,
            "cantidad_queso" => $this->cantidad_queso,
            "tipo_masa" => $this->tipo_masa
        );
    }
}
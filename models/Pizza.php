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

    private function chequearTermino($nombre = "Desconocido") {
        if ($this->terminado) {
            throw new \Exception("Esta pizza ya esta terminada. No se puede realizar accion: " . $nombre);
        }
    }

    public function agregarIngrediente($ingrediente) {
        $this->chequearTermino("agregarIngrediente");
        array_push($this->ingredientes, $ingrediente);
        return $this;
    }

    public function asignarTamano($tamano) {
        $this->chequearTermino("asignarTamano");
        $this->tamano = $tamano;
        return $this;
    }

    public function asignarCantidadQueso($cantidad) {
        $this->chequearTermino("asignarCantidadQueso");
        $this->cantidad_queso = $cantidad;
        return $this;
    }

    public function asignarTipoMasa($tipo) {
        $this->chequearTermino("asignarTipoMasa");
        $this->tipo_masa = $tipo;
        return $this;
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
<?php
namespace models;

require_once 'Notificacion.php';

class NotificacionInterna implements Notificacion {

    private $titulo;
    private $descripcion;
    private $prioridad;
    private $duracion;
    private $color;
    private $estado;
    
    public function __construct() {

    }

    public function setTitulo($value) {
        $this->titulo = $value;
        return $this;
    }

    public function setDescripcion($value) {
        $this->descripcion = $value;
        return $this;
    }

    public function setPrioridad($value) {
        $this->prioridad = $value;
        return $this;
    }

    public function setDuracion($value) {
        $this->duracion = $value;
        return $this;
    }

    public function setColor($value) {
        $this->color = $value;
        return $this;
    }

    public function setEstado($value) {
        $this->estado = $value;
        return $this;
    }

    public function construir() {
        return $this;
    }


    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrioridad() {
        return $this->prioridad;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function getColor() {
        return $this->color;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function mostrar() {
        return json_encode(array(
            "titulo" => $this->getTitulo(),
            "descripcion" => $this->getDescripcion(),
            "prioridad" => $this->getPrioridad(),
            "duracion" => $this->getDuracion(),
            "color" => $this->getColor(),
            "estado" => $this->getEstado()
        ));
    }
}
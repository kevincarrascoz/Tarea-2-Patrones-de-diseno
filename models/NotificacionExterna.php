<?php
namespace models;

require_once 'Notificacion.php';

class NotificacionExterna implements Notificacion {

    private $titulo;
    private $descripcion;
    private $prioridad;
    private $duracion;
    private $color;
    private $estado;

    private $ip;
    private $so;
    private $fecha;
    
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


    public function setIP($value) {
        $this->ip = $value;
        return $this;
    }
    public function setSO($value) {
        $this->so = $value;
        return $this;
    }
    public function setFecha($value) {
        $this->fecha = $value;
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

    public function getIP() {
        return $this->ip;
    }
    public function getSO() {
        return $this->so;
    }
    public function getFecha() {
        return $this->fecha;
    }


    public function mostrar() {
        return json_encode(array(
            "titulo" => $this->getTitulo(),
            "descripcion" => $this->getDescripcion(),
            "prioridad" => $this->getPrioridad(),
            "duracion" => $this->getDuracion(),
            "color" => $this->getColor(),
            "estado" => $this->getEstado(),
            "ip" => $this->getIP(),
            "so" => $this->getSO(),
            "fecha" => $this->getFecha()
        ));
    }
}
<?php
namespace models;

require_once 'Notificacion.php';
require_once 'ComponenteNotificacionExterna.php';

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
    protected $notificacionEx;
    
    public function __construct() {
        $this->notificacionEx = new ComponenteNotificacionExterna();
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
        $this->ip = $this->notificacionEx->compSetIP($value);
        return $this;
    }
    public function setSO($value) {
        $this->so = $this->notificacionEx->compSetSO($value);
        return $this;
    }
    public function setFecha($value) {
        $this->fecha = $this->notificacionEx->compSetFecha($value);
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
        return $this->notificacionEx->compGetIP();
    }
    public function getSO() {
        return $this->notificacionEx->compGetSO();
    }
    public function getFecha() {
        return $this->notificacionEx->compGetFecha();
    }


    public function mostrar2() {
        return array(
            "titulo" => $this->getTitulo(),
            "descripcion" => $this->getDescripcion(),
            "prioridad" => $this->getPrioridad(),
            "duracion" => $this->getDuracion(),
            "color" => $this->getColor(),
            "estado" => $this->getEstado(),
            "ip" => $this->getIP(),
            "so" => $this->getSO(),
            "fecha" => $this->getFecha()
        );
    }


    public function mostrar() {
        return json_encode($this->mostrar2());
    }
}
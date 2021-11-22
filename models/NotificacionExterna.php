<?php
namespace models;

require_once 'Notificacion.php';

class NotificacionInterna implements Notificacion {

    private $ip;
    private $so;
    private $fecha;
    
    public function __construct() {
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
            "ip" => $this->getIP(),
            "so" => $this->getSO(),
            "fecha" => $this->getFecha(),
        ));
    }
}
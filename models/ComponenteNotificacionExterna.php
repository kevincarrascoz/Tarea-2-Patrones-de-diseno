<?php

namespace models;

class ComponenteNotificacionExterna {

    protected $ip;
    protected $so;
    protected $fecha;

    public function compSetIP($value)
    {
        $this->ip = $value;
    }
    public function compSetSO($value)
    {
        $this->so = $value;
    }
    public function compSetFecha($value)
    {
        $this->fecha = $value;
    }

    public function compGetIP() {
        return $this->ip;
    }

    public function compGetSO() {
        return $this->so;
    }

    public function compGetFecha() {
        return $this->fecha;
    }

}
<?php
namespace models;

require_once 'Notificacion.php';

abstract class Decorador implements Notificacion {
    private $componente;
    
    public function __construct(Notificacion $componente){
        $this->componente = $componente;
    }

    public function getComponente() {
        return $this->componente;
    }
   
    public static function clsGetComponente($decorado) {
        $obj = $decorado;
        while(is_a($obj, 'Decorador')) {
            $obj = $obj->getComponente();
        }
        return $obj;
    }

    public function mostrar2() {
        return $this->componente->mostrar2();
    }

    public function mostrar() {
        return json_encode($this->mostrar2());
    }

    public function setTitulo($value) {
        $this->componente->titulo = $value;
        return $this;
    }

    public function setDescripcion($value) {
        $this->componente->descripcion = $value;
        return $this;
    }

    public function setPrioridad($value) {
        $this->componente->prioridad = $value;
        return $this;
    }

    public function setDuracion($value) {
        $this->componente->duracion = $value;
        return $this;
    }

    public function setColor($value) {
        $this->componente->color = $value;
        return $this;
    }

    public function setEstado($value) {
        $this->componente->estado = $value;
        return $this;
    }


    public function getTitulo() {
        return $this->componente->titulo;
    }

    public function getDescripcion() {
        return $this->componente->descripcion;
    }

    public function getPrioridad() {
        return $this->componente->prioridad;
    }

    public function getDuracion() {
        return $this->componente->duracion;
    }

    public function getColor() {
        return $this->componente->color;
    }

    public function getEstado() {
        return $this->componente->estado;
    }
}
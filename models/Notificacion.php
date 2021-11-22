<?php

namespace models;

interface Notificacion {

    public function setTitulo($titulo);
    public function setDescripcion($descripcion);
    public function setEstado($estado);
    public function setDuracion($duracion);
    public function setColor($color);
    public function setPrioridad($prioridad);

    public function getTitulo();
    public function getDescripcion();
    public function getEstado();
    public function getDuracion();
    public function getColor();
    public function getPrioridad();

}
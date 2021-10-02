<?php

namespace models;

interface Mostrar {
    /**
     * mostrar
     * @return string
     */
    public function mostrar();

    /**
     * serializar
     * @return mixed
     */
    public function serializar();
}
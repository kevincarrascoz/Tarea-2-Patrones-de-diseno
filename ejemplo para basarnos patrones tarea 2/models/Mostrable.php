<?php

namespace models;

interface Mostrable {
    /**
     * mostrar
     * 
     * Crea una representacion de este objeto como
     * una string de formato json
     * @return string
     */
    public function mostrar();

    /**
     * serializar
     *
     * Crea una representacion de este
     * objeto especialmente hecha para
     * serializar, para ser usada con 
     * json_encode y el metodo `mostrar`
     * @return mixed
     */
    public function serializar();
}
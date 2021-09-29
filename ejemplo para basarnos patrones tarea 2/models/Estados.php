<?php

namespace models;

require_once "Mostrable.php";
use models\Mostrable;

/**
 * Estados
 * 
 * Etapa en la que se encuentra un pedido
 */
class Estados implements Mostrable {

    private static $_pendiente;
    private static $_pagado;
    private static $_procesando;
    private static $_enviado;
    private static $_entregado;

    private function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * pendiente
     * 
     * Estado inicial de un pedido
     *
     * @return Estados
     */
    public static function pendiente() {
        if (is_null(self::$_pendiente)) {
            self::$_pendiente = new self("Pendiente");
        }
        return self::$_pendiente;
    }

    /**
     * pagado
     * 
     * Estado cuando se ha pagado el pedido
     *
     * @return Estados
     */
    public static function pagado() {
        if (is_null(self::$_pagado)) {
            self::$_pagado = new self("Pagado");
        }
        return self::$_pagado;
    }

    /**
     * enviado
     * 
     * Estado cuando esta en camino a ser recibido
     *
     * @return Estados
     */
    public static function enviado() {
        if (is_null(self::$_enviado)) {
            self::$_enviado = new self("Enviado");
        }
        return self::$_enviado;
    }

    /**
     * procesando
     * 
     * Estado cuando se esta procesando el pago del pedido
     *
     * @return Estados
     */
    public static function procesando() {
        if (is_null(self::$_procesando)) {
            self::$_procesando = new self("Procesando");
        }
        return self::$_procesando;
    }

    /**
     * entregado
     * 
     * Estado cuando el pedido ha llegado a las manos del cliente
     *
     * @return Estados
     */
    public static function entregado() {
        if (is_null(self::$_entregado)) {
            self::$_entregado = new self("Entregado");
        }
        return self::$_entregado;
    }


    public function mostrar() {
        return json_encode($this->serializar(), JSON_PRETTY_PRINT);
    }

    public function serializar() {
        return "Estados::" . $this->nombre;
    }
}
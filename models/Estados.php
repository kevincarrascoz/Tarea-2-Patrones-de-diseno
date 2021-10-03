<?php

namespace models;



/**
 * Estados
 * 
 * Etapa en la que se encuentra un pedido
 */
class Estados {

    private static $pendiente;
    private static $pagado;
    private static $procesando;
    private static $enviado;
    private static $entregado;

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
        if (is_null(self::$pendiente)) {
            self::$pendiente = new self("Pendiente");
        }
        return self::$pendiente;
    }

    /**
     * pagado
     * 
     * Estado cuando se ha pagado el pedido
     *
     * @return Estados
     */
    public static function pagado() {
        if (is_null(self::$pagado)) {
            self::$pagado = new self("Pagado");
        }
        return self::$pagado;
    }

    /**
     * enviado
     * 
     * Estado cuando esta en camino a ser recibido
     *
     * @return Estados
     */
    public static function enviado() {
        if (is_null(self::$enviado)) {
            self::$enviado = new self("Enviado");
        }
        return self::$enviado;
    }

    /**
     * procesando
     * 
     * Estado cuando se esta procesando el pago del pedido
     *
     * @return Estados
     */
    public static function procesando() {
        if (is_null(self::$procesando)) {
            self::$procesando = new self("Procesando");
        }
        return self::$procesando;
    }

    /**
     * entregado
     * 
     * Estado cuando el pedido ha llegado a las manos del cliente
     *
     * @return Estados
     */
    public static function entregado() {
        if (is_null(self::$entregado)) {
            self::$entregado = new self("Entregado");
        }
        return self::$entregado;
    }


    public function mostrar() {
        return json_encode($this->serializar(), JSON_PRETTY_PRINT);
    }

    public function serializar() {
        return "Estados::" . $this->nombre;
    }
}
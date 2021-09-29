<?php

require_once 'models/Producto.php';
require_once 'models/Cliente.php';
require_once 'models/Cheque.php';
require_once 'models/Efectivo.php';
require_once 'models/Tarjeta.php';
use models\Producto;
use models\Cliente;
use models\Cheque;
use models\Efectivo;
use models\Tarjeta;


function echoMostrar($nombre, $objeto, $br = true) {
    echo $nombre;
    echo "<br />";
    echo $objeto->mostrar();
    if($br) {
        echo "<br />";
    }
}


// instanciacion de producto: gelatina
$productoGelatina = Producto::nuevoProducto("gelatina", 0.50, 250.0, 1000);
echoMostrar("Producto: Gelatina", $productoGelatina);

// instanciacion de producto: mermelada
$productoMermelada = Producto::nuevoProducto("mermelada", 0.5, 500.0, 1000);
echoMostrar("Producto: Mermelada", $productoMermelada);

//instanciacion de producto: pan
$productoPan = Producto::nuevoProducto("pan", 1.0, 100.0, 2500);
echoMostrar("Producto: Pan", $productoPan);

// instanciacion de cliente
$nuevoCliente = new Cliente("Antonio Salazar", "Calle Sincera 123");
echoMostrar("Cliente", $nuevoCliente);

$orden = array (
    "pan" => 10,
    "gelatina" => 5
);
$nuevoPedido = $nuevoCliente->solicitar($orden);
echoMostrar("Pedido de cliente", $nuevoPedido, false);

echo "<ul><li>total a pagar pedido:<br />";
echo $nuevoPedido->calcularTotal();
echo "</li></ul>";

/*instanciación de un nuevo pago con cheque*/ 
$nuevoCheque = new Cheque(2530,'Cheque1','Banco Estado');
echoMostrar("Cheque", $nuevoCheque);

/*instanciación de un nuevo pago con efectivo*/ 
$nuevoEfectivo = new Efectivo(1530,'CLP');
echoMostrar("Efectivo", $nuevoEfectivo);

/*instanciación de un nuevo pago con tarjeta*/ 
$nuevoTarjeta = new Tarjeta(530, 241500,'09-15-2020','Mastercard');
echoMostrar("Tarjeta", $nuevoTarjeta);

/*autorizacion del pago con cheque */
$nuevoCheque->autorizar();
echoMostrar("Cheque", $nuevoCheque);

/*autorizacion del pago con tarjeta */
$nuevoTarjeta->autorizar();
echoMostrar("Tarjeta autorizada", $nuevoTarjeta);




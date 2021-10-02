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


function mostrarInfo($nombre, $objeto) {
    echo $nombre;
    echo "<br />";
    echo $objeto->mostrar();
    
}


// creacion de producto: gelatina
$productoNuevo1 = Producto::nuevoProducto("gelatina", 0.50, 250.0, 1000);
mostrarInfo("Producto: Gelatina", $productoNuevo1);

// creacion de producto: mermelada
$productoNuevo2 = Producto::nuevoProducto("mermelada", 0.5, 500.0, 1000);
mostrarInfo("Producto: Mermelada", $productoNuevo2);

//creacion de producto: pan
$productoNuevo3 = Producto::nuevoProducto("pan", 1.0, 100.0, 2500);
mostrarInfo("Producto: Pan", $productoNuevo3);

// creacion de cliente
$nuevoCliente1 = new Cliente("Antonio Salazar", "Calle Sincera 123");
mostrarInfo("Cliente", $nuevoCliente1);

$orden = array (
    "pan" => 10,
    "gelatina" => 5
);
$nuevoPedido1 = $nuevoCliente1->solicitar($orden);
mostrarInfo("Pedido de cliente", $nuevoPedido1, false);

echo "<li>total a pagar pedido: ";
echo $nuevoPedido1->calcularTotal();
echo "</li>";

// nuevo pago con cheque
$nuevoCheque1 = new Cheque(2530,'Cheque1','Banco Estado');
mostrarInfo("Cheque", $nuevoCheque1);

//nuevo pago con efectivo
$nuevoEfectivo1 = new Efectivo(1530,'CLP');
mostrarInfo("Efectivo", $nuevoEfectivo1);

//nuevo pago con tarjeta
$nuevoTarjeta1 = new Tarjeta(530, 241500,'06-20-2028','Mastercard');
mostrarInfo("Tarjeta", $nuevoTarjeta1);

//autorizacion del pago con cheque
$nuevoCheque1->autorizar();
mostrarInfo("Cheque", $nuevoCheque1);

//autorizacion del pago con tarjeta
$nuevoTarjeta1->autorizar();
mostrarInfo("Tarjeta autorizada", $nuevoTarjeta1);




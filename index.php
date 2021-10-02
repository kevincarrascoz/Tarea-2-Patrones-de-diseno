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


// creacion de producto: Tallarines
$productoNuevo1 = Producto::nuevoProducto("Tallarines", 0.70, 120.0, 500);
mostrarInfo("Producto: Gelatina ", $productoNuevo1);

// creacion de producto: Salsa de tomate
$productoNuevo2 = Producto::nuevoProducto("Salsa de tomates", 0.80, 790.0, 250);
mostrarInfo("Producto: Mermelada ", $productoNuevo2);

//creacion de producto: Carne
$productoNuevo3 = Producto::nuevoProducto("Carne", 5.0, 6000.0, 20);
mostrarInfo("Producto: Pan ", $productoNuevo3);

// creacion de cliente
$nuevoCliente1 = new Cliente("Kevin Carrasco Zenteno", "Finlandia 1667");
mostrarInfo("Cliente: ", $nuevoCliente1);

$orden = array (
    "Tallarines" => 10,
    "Salsa de tomates" => 5
);
$nuevoPedido1 = $nuevoCliente1->solicitar($orden);
mostrarInfo("Pedido del  cliente: ", $nuevoPedido1, false);

echo "<li>El total a pagar del pedido es: ";
echo $nuevoPedido1->calcularTotal();
echo "</li>";

// nuevo pago con cheque
$nuevoCheque1 = new Cheque(2530,'Pago alimentos','Banco BCI');
mostrarInfo("Cheque: ", $nuevoCheque1);

//nuevo pago con efectivo
$nuevoEfectivo1 = new Efectivo(2660,'CLP');
mostrarInfo("Efectivo", $nuevoEfectivo1);

//nuevo pago con tarjeta
$nuevoTarjeta1 = new Tarjeta(530, 241500,'06-20-2028','Visa');
mostrarInfo("Tarjeta", $nuevoTarjeta1);

//autorizacion del pago con cheque
$nuevoCheque1->autorizar();
mostrarInfo("Cheque", $nuevoCheque1);

//autorizacion del pago con tarjeta
$nuevoTarjeta1->autorizar();
mostrarInfo("Tarjeta autorizada", $nuevoTarjeta1);




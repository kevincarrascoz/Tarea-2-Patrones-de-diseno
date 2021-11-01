<?php
require_once 'models/Producto.php';
require_once 'models/Cliente.php';
require_once 'models/Cheque.php';
require_once 'models/Efectivo.php';
require_once 'models/Tarjeta.php';
require_once 'models/Pizza.php';
require_once 'models/Pizzeria.php';


use models\Producto;
use models\Cliente;
use models\Cheque;
use models\Efectivo;
use models\Tarjeta;
use models\Pizzeria;
use models\Pizza;



function mostrarInfo($nombre, $objeto) {
    echo $nombre;
    echo "<br />";
    echo $objeto->mostrar();
    
}


// creacion de producto: Tallarines
$productoNuevo1 = Producto::nuevoProducto("Tallarines", 0.70, 120.0, 500);
echo '<br>';
mostrarInfo("Producto: Tallarines ", $productoNuevo1);
// creacion de producto: Salsa de tomate
$productoNuevo2 = Producto::nuevoProducto("Salsa de tomates", 0.80, 790.0, 250);
echo '<br>';
mostrarInfo("Producto: Salsa de tomates ", $productoNuevo2);
//creacion de producto: Carne
$productoNuevo3 = Producto::nuevoProducto("Carne", 5.0, 6000.0, 20);
echo '<br>';
mostrarInfo("Producto: Carne ", $productoNuevo3);
//creacion de producto: Lasagna
$productoNuevo4 = Producto::nuevoProducto("Lasagna", 0.90, 6000.0, 40);
echo '<br>';
mostrarInfo("Producto: Lasagna", $productoNuevo4);

echo '<br>';
//obtiene el peso de un producto
echo '<br> El peso de los Tallarines es ', $productoNuevo1->obtenerPeso(), ' Kg';
echo '<br> El peso de la Salsa de tomates es ', $productoNuevo2->obtenerPeso(), ' Kg';
echo '<br> El peso de la Carne es ', $productoNuevo3->obtenerPeso(), ' Kg';
echo '<br> El peso de la Lasagna es ', $productoNuevo4->obtenerPeso(), ' Kg';

echo '<br>';
// creacion de cliente
$nuevoCliente1 = new Cliente("Kevin Carrasco Zenteno", "Finlandia 1667");
echo '<br>';
mostrarInfo("Cliente: ", $nuevoCliente1);

$orden = array (
    "Tallarines" => 10,
    "Salsa de tomates" => 5 //10  y 5 son la cantidad del producto
);
$nuevoPedido1 = $nuevoCliente1->solicitar($orden);
echo '<br>';
mostrarInfo("Pedido del  cliente: ", $nuevoPedido1);


echo "<li>El subtotal a pagar del pedido es: ";
echo $nuevoPedido1->calcularSubTotal();

echo "<li>El total a pagar del pedido es: ";
echo $nuevoPedido1->calcularTotal();
echo "</li>";
$pagoaRealizar = $nuevoPedido1->calcularTotal();

// nuevo pago con cheque
$nuevoCheque1 = new Cheque($pagoaRealizar,'Pago alimentos','Banco BCI');
echo '<br>';
mostrarInfo("Cheque: ", $nuevoCheque1);

//nuevo pago con efectivo
$nuevoEfectivo1 = new Efectivo($pagoaRealizar,'CLP');
echo '<br>';
mostrarInfo("Efectivo", $nuevoEfectivo1);

//nuevo pago con tarjeta
$nuevoTarjeta1 = new Tarjeta($pagoaRealizar, 241500,'06-20-2028','Visa');
echo '<br>';
mostrarInfo("Tarjeta", $nuevoTarjeta1);

//autorizacion del pago con cheque
$nuevoCheque1->autorizar();
echo '<br>';
mostrarInfo("Cheque autorizado", $nuevoCheque1);

//autorizacion del pago con tarjeta
$nuevoTarjeta1->autorizar();
echo '<br>';
mostrarInfo("Tarjeta autorizada", $nuevoTarjeta1);

echo "<br>Inicio datos pizzeria<br>";
$empresa = Pizzeria::Instance();
$empresa->setNombre("Don Carter");
$empresa->setDireccion("Finlandia 1667");
$empresa->setDueno("Leo rey");
$empresa->setRun(19834922-4);
$empresa->setTelefono(942018931);
echo $empresa->mostrar();
echo "<br>";
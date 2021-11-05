<?php
require_once 'models/Pizza.php';
require_once 'models/Pago.php';
require_once 'models/Efectivo.php';
require_once 'models/Tarjeta.php';
require_once 'models/Pizzeria.php';
require_once 'models/Cliente.php';
require_once 'models/ClienteCredito.php';
require_once 'models/ClienteEfectivo.php';
require_once 'models/Pedido.php';

use models\Pizza;
use models\Pago;
use models\Efectivo;
use models\Tarjeta;
use models\Pizzeria;
use models\Cliente;
use models\ClienteCredito;
use models\ClienteEfectivo;
use models\Pedido;




/*Ingresos datos pizzeria con instanciacion singleton*/ 
echo "<br>Ingreso datos de la pizzeria<br>";
$pizzeria = Pizzeria::Instance();
$pizzeria->setNombre("Don Carter");
$pizzeria->setDireccion("Edimburgo 1712");
$pizzeria->setDueno("Carter Mayor");
$pizzeria->setRun(113510112);
$pizzeria->setTelefono(987654321);
echo $pizzeria->mostrar();
echo "<br>";


/*Creacion nuevo cliente*/
echo "<br>Nuevo cliente 1<br>";
$cliente1 = new ClienteCredito("Kevin Carrasco",198349224,"kcarrasco@gmail.com");
echo $cliente1->mostrar();
echo "<br>";

echo "<br>Ejemplo creacion pizza<br>";
$pizza = (new Pizza());
$pizza->asignarTamano("grande");
$pizza->agregarIngrediente("pepperoni");
$pizza->agregarIngrediente("choclo");
$pizza->agregarIngrediente("tocino");
$pizza->asignarCantidadQueso("extra");
$pizza->asignarTipoMasa("delgada");
$pizza->terminar();
echo $pizza->mostrar();
echo "<br>";

/* ejemplo como realizar un pedido */
echo "<br>Ejemplo pedido pizza<br>";
$pedido = $cliente1->solicitar2();
$pedidoPizza = $pedido->nuevaPizza();
$pedidoPizza->asignarTipoMasa("delgada");
$pedidoPizza->asignarTamano("mediana");
$pedidoPizza->asignarCantidadQueso("normal");
$pedidoPizza->agregarIngrediente("tomate");
$pedidoPizza->agregarIngrediente("choclo");
$pedidoPizza->agregarIngrediente("peperoni americano");
$pedidoPizza->terminar();
$pedido->terminarPedido();
echo $cliente1->mostrar();
echo "<br>";

/*instanciación de un nuevo pago con tarjeta*/ 
echo "<br>Ejemplo pago<br>";
$tarjetaCliente1 = new Tarjeta(14499,123456798,'12-05-2028');
echo "<br>Tarjeta <br>";
echo $tarjetaCliente1->mostrar();
$pedido->pagar($tarjetaCliente1);
echo "<br>";
echo $pedido->mostrar();
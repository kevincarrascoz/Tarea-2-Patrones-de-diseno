<?php
require_once 'models/Aplicacion.php';
require_once 'models/ComponenteNotificacionExterna.php';
require_once 'models/Decorador.php';
require_once 'models/FuenteDecorador.php';
require_once 'models/InterlineadoDecorador.php';
require_once 'models/Notificacion.php';
require_once 'models/NotificacionExterna.php';
require_once 'models/NotificacionInterna.php';

use models\Aplicacion;
use models\ComponenteNotificacionExterna;
use models\Decorador;
use models\FuenteDecorador;
use models\InterlineadoDecorador;
use models\Notificacion;
use models\NotificacionExterna;
use models\NotificacionInterna;


echo "<br>Ingreso datos Aplicacion<br>";
$aplicacion = Aplicacion::Instance();
$aplicacion->setNombre("Aplicacion");
$aplicacion->setDueno("Kevin Carrasco");
echo $aplicacion->mostrar();
echo "<br><br>";

$notificacionInterna = new NotificacionInterna();
$notificacionInterna->setTitulo("Notificacion Interna 1");
$notificacionInterna->setDescripcion("Descripcion xd");
$notificacionInterna->setPrioridad("Alta");
$notificacionInterna->setDuracion(1.5);
$notificacionInterna->setColor("#000123");
$notificacionInterna->setEstado("Activa");
echo "Notificacion interna 1<br>";
echo $notificacionInterna->mostrar(); 
echo "<br><br>";
// ejemplo decorador con notificacion interna 1 
$interlineadodecoradorInterna = new InterlineadoDecorador($notificacionInterna);  
$fuentedecoradorInterna = new FuenteDecorador($interlineadodecoradorInterna);
echo "Notificacion interna 1 decorada<br>";
echo $fuentedecoradorInterna->mostrar();
echo "<br><br>";
InterlineadoDecorador::clsSetInterlineado($fuentedecoradorInterna, '3.5');
echo "Notificacion interna 1 decorada, cambiando el interlineado";
echo "<br>";
echo $fuentedecoradorInterna->mostrar();
echo "<br><br>";
$notificacionExterna = new NotificacionExterna();
$notificacionExterna->setTitulo("Notificacion Externa 1");
$notificacionExterna->setDescripcion("Descripcion externa");
$notificacionExterna->setPrioridad("Media");
$notificacionExterna->setDuracion(2.5);
$notificacionExterna->setColor("#000453");
$notificacionExterna->setEstado("Activa");

$notificacionExterna->setIP("200.130.20.152");
$notificacionExterna->setSO("Android 10.1");
$notificacionExterna->setFecha("23-11-2021");
echo "Notificacion externa sin decorar<br>";
echo $notificacionExterna->mostrar(); 
echo "<br><br>";
// ejemplo decorador con notificacion interna 1 
$interlineadodecoradorExterna = new InterlineadoDecorador($notificacionExterna);  
$fuentedecoradorExterna = new FuenteDecorador($interlineadodecoradorExterna);
echo "Notificacion interna 1 decorada<br>";
echo $fuentedecoradorExterna->mostrar();
echo "<br><br>";
InterlineadoDecorador::clsSetInterlineado($fuentedecoradorExterna, '4.5');
echo "Notificacion interna 1 decorada, cambiando el interlineado";
echo "<br>";
echo $fuentedecoradorExterna->mostrar();
echo "<br><br><br>";
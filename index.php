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
echo "<br>";

$notificacionInterna = new NotificacionInterna();
$notificacionInterna->setTitulo("Notificacion Interna 1");
$notificacionInterna->setDescripcion("Descripcion xd");
$notificacionInterna->setPrioridad("Alta");
$notificacionInterna->setDuracion(2.5);
$notificacionInterna->setColor("#000123");
$notificacionInterna->setEstado("Activa");
echo "Notificacion interna sin decorar<br>";
echo $notificacionInterna->mostrar(); 
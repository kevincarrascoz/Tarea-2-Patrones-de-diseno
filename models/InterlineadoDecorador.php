<?php
namespace models;


require_once 'Decorador.php';

class InterlineadoDecorador extends Decorador{

    public $interlineado = '2.5';
   
    public static function getPrimerInterlineadoDecorador($decorado) {
        $obj = $decorado;
        $my_cls = '\models\InterlineadoDecorador';
        $dec_cls = '\models\Decorador';
        while(!is_a($obj, $my_cls) and is_a($obj, $dec_cls)) {
            $obj = $obj->getComponente();
        }
        if (is_a($obj, $my_cls)) {
            return $obj;
        } else {
            return null;
        }
    }

    public static function clsGetInterlineado($decorado) {
        $obj = InterlineadoDecorador::getPrimerInterlineadoDecorador($decorado);
        return $obj->getInterlineado();
    }

    public static function clsSetInterlineado($decorado, $interlineado) {
        $obj = InterlineadoDecorador::getPrimerInterlineadoDecorador($decorado);
        $obj->setInterlineado($interlineado);
        return true;
    }

    public function setInterlineado($interlineado) {
        $this->interlineado = $interlineado;
    }

    public function getInterlineado(){
        return $this->interlineado;
    }

    public function mostrar2() {
        $obj = parent::mostrar2();
        $obj['interlineado'] = $this->getInterlineado();
        return $obj;
    }
}

?>
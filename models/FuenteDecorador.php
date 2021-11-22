<?php
namespace models;


require_once 'Decorador.php';

class FuenteDecorador extends Decorador{

    public $fuente = 'Roboto';

    public static function getPrimerFuenteDecorador($decorado) {
        $obj = $decorado;
        $my_cls = '\models\FuenteDecorador';
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

    public static function clsGetFuente($decorado) {
        $obj = EfectoDecorador::getPrimerFuenteDecorador($decorado);

        if (is_null($obj)) {
            throw new \Exception("Object was not decorated with FuenteDecorador.");
        }
        return $obj->getFuente();
    }

    public static function clsSetFuente($decorado, $fuente) {
        $obj = FuenteDecorador::getPrimerFuenteDecorador($decorado);
        if (is_null($obj)) {
            throw new \Exception("Object was not decorated with FuenteDecorador.");
        }
        $obj->setFuente($fuente);
        return true;
    }

    public function setFuente($fuente) {
        $this->fuente = $fuente;
    }

    public function getFuente(){
        return $this->fuente;
    }

    public function mostrar2() {
        $obj = parent::mostrar2();
        $obj['fuente'] = $this->getFuente();
        return $obj;
    }
    
}

?>
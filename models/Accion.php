<?php
class Accion extends Videojuego{
    private $tipoArmas;

    function __construct($nombre,$duracion,$tipoArmas,$id=null){
        parent::__construct($nombre,$duracion,$id);
        $this->tipoArmas=$tipoArmas;
    }

    public function getTipoArmas(){
        return $this->tipoArmas;
    }

    public function setTipoArmas($tipoArmas){
        $this->tipoArmas = $tipoArmas;
    }
}
?>
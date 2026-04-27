<?php
    class Terror extends Videojuego{
        private $tipoTerror;

        function __construct($nombre,$duracion,$tipoTerror,$id=null){
            parent::__construct($nombre,$duracion,$id);
            $this->tipoTerror=$tipoTerror;
        }

        public function getTipoTerror(){
            return $this->tipoTerror;
        }

        public function setTipoTerror($tipoTerror){
            $this->tipoArmas = $tipoTerror;
        }
    }
?>
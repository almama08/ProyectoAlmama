<?php
class Videojuego{
    protected $id;
    protected $nombre;
    protected $duracion;

    function __construct($nombre,$duracion,$id=null){
        $this->nombre=$nombre;
        $this->duracion=$duracion;
        $this->id=$id;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function setDuracion($duracion){
        $this->duracion = $duracion;
    }
}
?>
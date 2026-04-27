<?php

    class Gestor extends Connection{

        function __construct(){
            parent::__construct();
        }

        public function listar(){
            $lista=[];
            $consulta='SELECT * FROM juegos';
            $stmt=$this->getConn()->query($consulta);
            $variantesAccion=['Acción','Accion','acción','accion'];
            while($value=$stmt->fetch(PDO::FETCH_ASSOC)){
                if(in_array($value['genero'],$variantesAccion)){
                    $juego=new Accion(
                        $value['nombre'],
                        $value['duracion'],
                        $value['tipo_armas'],
                        $value['id']
                    );
                }else{
                    $juego=new Terror(
                        $value['nombre'],
                        $value['duracion'],
                        $value['tipo_terror'],
                        $value['id']
                    );
                }
                $lista[]=$juego;
            }
            return $lista;
        }
    }

?>
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

        public function añadir($juego){
            $sql='INSERT into juegos (nombre, duracion, genero, tipo_armas, tipo_terror)
            VALUES (:nombre, :duracion, :genero, :tipo_armas, :tipo_terror)';

            $stmt=$this->getConn()->prepare($sql);

            $genero=get_class($juego);

            $tipoArmas=null;
            $tipoTerror=null;

            if($juego instanceof Accion){
                $tipoArmas=$juego->getTipoArmas();
            }elseif($juego instanceof Terror){
                $tipoTerror=$juego->getTipoTerror();
            }

            $stmt->execute([
                ':nombre'=>$juego->getNombre(),
                ':duracion'=>$juego->getDuracion(),
                ':genero'=>$genero,
                ':tipo_armas'=>$tipoArmas,
                ':tipo_terror'=>$tipoTerror
            ]);
        }

        public function eliminar($id){
            $sql='DELETE FROM juegos WHERE id=:id';
            $stmt=$this->getconn()->prepare($sql);
            $stmt->bindValue(':id',$id);
            return $stmt->execute();
        }
    }

?>
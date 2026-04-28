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

        public function buscarJuegoPorId($id){
            $sql='SELECT * FROM juegos WHERE id=:id';
            $stmt=$this->getConn()->prepare($sql);
            $stmt->bindvalue(':id',$id);
            $stmt->execute();

            $res=$stmt->fetch(PDO::FETCH_ASSOC);

            if($res){
                if($res['genero']=="Terror"){
                    return new Terror($res['nombre'],$res['duracion'],$res['tipo_terror'],$res['id']);
                }else{
                    return new Accion($res['nombre'],$res['duracion'],$res['tipo_armas'],$res['id']);
                }
            }
            return null;
        }

        public function modificar($juego){
            if($juego instanceof Terror){
                $sql='UPDATE juegos SET nombre=:nombre,
                duracion=:duracion, genero=:genero,tipo_terror=:especifico,
                tipo_armas=NULL WHERE id=:id';
                $especifico=$juego->getTipoTerror();
                $genero=$juego->getGenero();
            }else{
                $sql='UPDATE juegos SET nombre=:nombre,
                duracion=:duracion, genero=:genero,tipo_armas=:especifico,
                tipo_terror=NULL WHERE id=:id';
                $especifico=$juego->getTipoArmas();
                $genero=$juego->getGenero();
            }

            $stmt=$this->getconn()->prepare($sql);

            $stmt->bindValue(':nombre',$juego->getNombre());
            $stmt->bindValue(':duracion',$juego->getDuracion());
            $stmt->bindValue(':genero',$genero);
            $stmt->bindValue(':especifico',$especifico);
            $stmt->bindValue(':id',$juego->getId());

            return $stmt->execute();
        }

        public function registroUsuario(Usuario $usuario){
            $sql='INSERT INTO usuarios (email, password) VALUES (:email,:password)';
            $stmt=$this->getConn()->prepare($sql);

            $stmt->bindValue(':email',$usuario->getEmail());
            $stmt->bindValue(':password',$usuario->getPassword());

            return $stmt->execute();
        }

        public function buscarUsuarioPorEmail($email){
            $sql='SELECT * FROM usuarios WHERE email= :email LIMIT 1';
            $stmt=$this->getConn()->prepare($sql);
            $stmt->bindValue(':email',$email);
            $stmt->execute();

            $value=$stmt->fetch(PDO::FETCH_ASSOC);

            if($value){
                return new Usuario($value['email'],$value['password'],$value['id']);
            }
            return false;
        }
    }

?>
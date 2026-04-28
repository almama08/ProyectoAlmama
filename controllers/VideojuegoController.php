<?php

    class VideojuegoController{
        private $gestor;

        function __construct($gestor){
            $this->gestor=$gestor;
        }

        public function index($colorRecibido='white'){
            $lista=$this->gestor->listar();

            $color=$colorRecibido;

            include "views/listar.php";
        }

        public function añadir(){
            include "views/añadir.php";
        }

        public function añadirTerror(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $juego=new Terror(
                    $_POST['nombre'],$_POST['duracion'],$_POST['tipoTerror']
                );
                $this->gestor->añadir($juego);
                header('Location: index.php');
                exit;
            }
        include 'views/añadirTerror.php';
        }

        public function añadirAccion(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $juego=new Accion(
                    $_POST['nombre'],$_POST['duracion'],$_POST['tipoArmas']
                );
                $this->gestor->añadir($juego);
                header('Location: index.php');
                exit;
            }
        include 'views/añadirAccion.php';
        }

        public function eliminar(){
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $this->gestor->eliminar($id);
                header('Location: index.php');
            }
            exit;
        }

        public function editar(){
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $genero=$_POST['genero'];

                if($genero=="Terror"){
                    $juego=new Terror(
                        $_POST['nombre'],$_POST['duracion'],$_POST['tipoTerror'],$_POST['id']);
                }else{
                    $juego=new Accion(
                        $_POST['nombre'],$_POST['duracion'],$_POST['tipoArmas'],$_POST['id']);
                }

                $this->gestor->modificar($juego);
                header('Location: index.php');
                exit;
            }
            $id=$_GET['id'];
            $juego=$this->gestor->buscarJuegoPorId($id);
            include 'views/editar.php';
        }
    }

?>
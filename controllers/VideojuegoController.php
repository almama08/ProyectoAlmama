<?php

    class VideojuegoController{
        protected $gestor;

        function __construct($gestor){
            $this->gestor=$gestor;
        }

        public function index(){
            $lista=$this->gestor->listar();

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
    }

?>
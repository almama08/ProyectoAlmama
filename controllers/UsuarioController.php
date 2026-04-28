<?php

    class UsuarioController{
        private $gestor;

        function __construct($gestor){
            $this->gestor=$gestor;
        }

        public function registroUsuario(){
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $email=$_POST['email'];
                $passwordPlana=$_POST['password'];

                $passwordHash=password_hash($passwordPlana,PASSWORD_DEFAULT);

                $nuevoUsuario=new Usuario($email,$passwordHash);

                $this->gestor->registroUsuario($nuevoUsuario);

                header('Location: index.php?accion=login');
                exit;
            }
            include "views/registroUsuario.php";
        }

        public function login(){
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $email=$_POST['email'];
                $passwordPlana=$_POST['password'];
                $recordar=isset($_POST['recordarme']);
                
                $usuario=$this->gestor->buscarUsuarioPorEmail($email);

                if($usuario && password_verify($passwordPlana,$usuario->getPassword())){
                    $_SESSION['usuario_id']=$usuario->getId();
                    $_SESSION['usuario_email']=$usuario->getEmail();

                    if($recordar){

                        $token=base64_encode($usuario->getemail());

                        setcookie(
                            "usuario_login",
                            $token,
                            [
                                'expires'=>time()+(86400*30),
                                'path'=>'/',
                                'httponly'=>true,
                                'samesite'=>'Strict'
                            ]
                        );
                    }

                    header('Location: index.php');
                    exit;
                }else{
                    $error="Credenciales incorrectas.";
                }
            }
            include 'views/login.php';
        }

        public function logout(){
            $_SESSION=[];
            session_destroy();

            if(isset($_COOKIE['usuario_login'])){
                setcookie('usuario_login','',time()-3600000,'/');
            }

            if(isset($_COOKIE['usuario_color'])){
                setcookie('usuario_color','',time()-360000,'/');
            }

            header('Location: index.php?accion=login');
            exit;
        }
    }

?>
<?php
    session_start();
    require_once "autoload.php";

    $color=$_POST['color'] ?? $_COOKIE['usuario_color'] ?? 'white';

    if(isset($_POST['color'])){
        setcookie('usuario_color',$_POST['color'],time()+(86400*30),'/');
    }

    $gestor=new Gestor();
    $videojuegoController=new VideojuegoController($gestor);
    $usuarioController=new UsuarioController($gestor);

    $accion=$_GET['accion'] ?? "index";

    if(!isset($_SESSION['usuario_id']) && isset($_COOKIE['usuario_login'])){
        $emailRecuperado=base64_decode($_COOKIE['usuario_login']);

        $usuario=$gestor->buscarUsuarioPorEmail($emailRecuperado);

        if($usuario){
            $_SESSION['usuario_id']=$usuario->getId();
            $_SESSION['usuario_email']=$usuario->getEmail();
        }else{
            setcookie('usuario_login','',time()-3600,'/');
        }
    }

    switch($accion){
        //opciones gestión usuarios
        case 'login':
            $usuarioController->login();
            break;
        case 'registroUsuario':
            $usuarioController->registroUsuario();
            break;
        case 'logout':
            $usuarioController->logout();
            break;
        //opciones gestión videojuegos
        case 'editar':
        case 'eliminar':
        case 'añadirTerror':
        case 'añadirAccion':
        case 'añadir':
            if(!isset($_SESSION['usuario_id'])){
                header('Location: index.php?accion=login');
                exit;
            }
            if($accion=='editar')$videojuegoController->editar();
            if($accion=='eliminar')$videojuegoController->eliminar();
            if($accion=='añadir')$videojuegoController->añadir();
            if($accion=='añadirTerror')$videojuegoController->añadirTerror();
            if($accion=='añadirAccion')$videojuegoController->añadirAccion();
            break;
        default:
            $videojuegoController->index($color);
            break;
    }
?>
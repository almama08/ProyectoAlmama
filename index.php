<?php
    session_start();
    require_once "autoload.php";

    $gestor=new Gestor();
    $videojuegoController=new VideojuegoController($gestor);
    $usuarioController=new UsuarioController($gestor);

    $accion=$_GET['accion'] ?? "index";

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
            $videojuegoController->index();
            break;
    }
?>
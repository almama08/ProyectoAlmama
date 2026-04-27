<?php
    require_once "autoload.php";

    $gestor=new Gestor();
    $videojuegoController=new VideojuegoController($gestor);

    $accion=$_GET['accion'] ?? "index";

    switch($accion){
        //opciones gestión usuarios
        //opciones gestión videojuegos
        case 'editar':
        case 'eliminar':
        case 'añadirTerror':
        case 'añadirAccion':
        case 'añadir':
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
<?php
    require_once "autoload.php";

    $gestor=new Gestor();
    $videojuegoController=new VideojuegoController($gestor);
    $usuarioController=new UsuarioController($gestor);

    $accion=$_GET['accion'] ?? "index";

    switch($accion){
        //opciones gestión usuarios
        //opciones gestión videojuegos
        case 'editar':

        case 'añadir':

        case 'eliminar':

        default:
            $videojuegoController->index();
            break;
    }
?>
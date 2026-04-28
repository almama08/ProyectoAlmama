<html>
    <head>
        <title>Lista de videojuegos</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h2>Lista de Videojuegos</h2>

        <?php if(isset($_SESSION['usuario_id'])): ?>
            <p>Bienvenido, <?= $_SESSION['usuario_email'] ?></p>
            <a href="index.php?accion=logout" class="glyphicon glyphicon-off">Cerrar sesión</a><br><br>
            <a href="index.php?accion=añadir" class="btn btn-success btn-lg">Añadir nuevo videojuego</a><br>
        <?php else: ?>
            <a href="index.php?accion=registroUsuario" class="glyphicon glyphicon-user">Registrarse</a><br>
            <a href="index.php?accion=login" class="glyphicon glyphicon-log-in">Iniciar sesión</a><br>
        <?php endif; ?>

        <div class="container-fluid">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Duración (Horas)</th>
                        <th>Género</th>
                        <th>Info específica</th>
                        <?php if(isset($_SESSION['usuario_id'])): ?>
                            <th>Acciones</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista as $juego): ?>
                    <tr>
                        <td><?= $juego->getNombre() ?></td>
                        <td><?= $juego->getDuracion() ?></td>
                        <td><?= $juego->getGenero() ?></td>
                        <td>
                            <?php
                                if($juego instanceof Accion){
                                    echo "<strong>Armas:</strong> " . $juego->getTipoArmas();
                                }elseif($juego instanceof Terror){
                                    echo "<strong>Terror:</strong> " . $juego->getTipoTerror();
                                }
                            ?>
                        </td>
                        <?php if(isset($_SESSION['usuario_id'])): ?>
                            <td>
                                <a href="index.php?accion=editar&id=<?= $juego->getId() ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="index.php?accion=eliminar&id=<?= $juego->getId() ?>" onclick="return confirm('Eliminar este videojuego?')" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h2>Iniciar sesión</h2>

    <?php if(isset($error)): ?>
        <p class="alert alert-danger text-center">Error: <?= $error ?></p>
    <?php endif; ?>

    <form action="index.php?accion=login" method="POST">
        <p>
            <label>Email:</label>
            <input type="email" name="email" required>
        </p>
        <p>
            <label>Contraseña:</label>
            <input type="password" name="password" required minlength="4">
        </p>
        <input type="checkbox" name="recordarme">Recordarme en este equipo<br><br>
        <button type="submit" class="btn btn-success">Acceder</button>
    </form>

    <p>¿No tienes cuenta? <a href="index.php?accion=registroUsuario" class="glyphicon glyphicon-user">Crear cuenta</a></p>
    <a href="index.php" class="btn btn-default btn-sm">Volver al inicio</a>
    
</body>
</html>
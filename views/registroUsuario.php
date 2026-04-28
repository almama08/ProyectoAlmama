<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar de alta un usuario</title>
</head>
<body>
    <h2>Crear cuenta de usuario</h2>

    <form action="index.php?accion=registroUsuario" method="POST">
        <p>
            <label>Email:</label>
            <input type="email" name="email" required>
        </p>
        <p>
            <label>Contraseña:</label>
            <input type="password" name="password" required minlength="4">
        </p>
        <button type="submit" class="btn btn-success">Crear cuenta</button>
    </form>

    <p>¿Ya tienes cuenta? <a href="index.php?accion=login" class="glyphicon glyphicon-log-in">Iniciar sesión</a></p>
    <a href="index.php" class="btn btn-default btn-sm">Volver al inicio</a>
</body>
</html>
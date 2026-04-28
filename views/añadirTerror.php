<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir videojuego de terror</title>
</head>
<body>
    <h2>Añadir videojuego de terror</h2>
    <form action="index.php?accion=añadirTerror" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" placeholder="Escribe el nombre"><br>

        <label>Duración (Horas):</label><br>
        <input type="text" name="duracion" placeholder="Escribe la duración"><br>

        <label>Tipo de terror:</label>
        <select name="tipoTerror">
            <option value="Psicológico">Psicológico</option>
            <option value="Survival horror">Survival Horror</option>
        </select><br>

        <button type="submit" class="btn btn-success btn-lg">Añadir videojuego</button>
    </form>
    <br>
    <a href="index.php?accion=añadir" class="btn btn-default btn-sm">volver atrás</a>
</body>
</html>
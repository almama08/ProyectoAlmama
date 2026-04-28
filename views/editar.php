<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar videojuego</title>
</head>
<body>
    <h2>Modificar datos del videojuego</h2>

    <form action="index.php?accion=editar" method="POST">
        <input type="hidden" name="id" value="<?= $juego->getId(); ?>">
        <input type="hidden" name="genero" value="<?= $juego->getGenero(); ?>">

        <p>
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?= $juego->getNombre(); ?>">
        </p>

        <p>
            <label>Duración (Horas):</label>
            <input type="text" name="duracion" value="<?= $juego->getDuracion(); ?>">
        </p>

        <?php if(get_class($juego)=="Terror"): ?>
            <p>
                <label">Tipo de terror:</label>
                <select name="tipoTerror">
                    <option value="Psicológico" <?= ($juego->getTipoTerror() == "Psicológico") ? "selected" : "" ?>>Psicológico</option>
                    <option value="Survival horror" <?= ($juego->getTipoTerror() == "Survival horror") ? "selected" : "" ?>>Survival horror</option>
                </select>
            </p>
        <?php elseif(get_class($juego)=="Accion"): ?>
            <p>
                <label">Tipo de armas:</label>
                <select name="tipoArmas">
                    <option value="Cuerpo a cuerpo" <?= ($juego->getTipoArmas() == "Cuerpo a cuerpo") ? "selected" : "" ?>>Cuerpo a cuerpo</option>
                    <option value="A distancia" <?= ($juego->getTipoArmas() == "A distancia") ? "selected" : "" ?>>A distancia</option>
                </select>
            </p>
        <?php endif; ?>
        <br>
        <button type="submit">guardar cambios</button>
        <a href="index.php">cancelar y volver</a>
    </form>
</body>
</html>
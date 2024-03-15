<?php
require_once 'TipoCompetenciaController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new TipoCompetenciaController(new TipoCompetenciaModel($db));

// Ver todos los tipos de competencia
$tiposCompetencia = $controller->index();

// Código HTML para mostrar los tipos de competencia y opciones para ver, editar y eliminar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Competencia</title>
</head>
<body>
    <h1>Tipos de Competencia</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        <?php while ($tipo = $tiposCompetencia->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $tipo['id']; ?></td>
                <td><?php echo $tipo['nombre']; ?></td>
                <td><?php echo $tipo['descripcion']; ?></td>
                <td>
                    <a href="ver_tipo_competencia.php?id=<?php echo $tipo['id']; ?>">Ver</a>
                    <a href="editar_tipo_competencia.php?id=<?php echo $tipo['id']; ?>">Editar</a>
                    <a href="eliminar_tipo_competencia.php?id=<?php echo $tipo['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
?>

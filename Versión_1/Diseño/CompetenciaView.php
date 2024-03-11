<?php
require_once 'CompetenciaController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new CompetenciaController($db);

// Ver todas las competencias
$competencias = $controller->getAllCompetencias();

// Código HTML para mostrar las competencias y opciones para ver, editar y eliminar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competencias</title>
</head>
<body>
    <h1>Competencias</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha Inicio Inscripción</th>
            <th>Fecha Fin Inscripción</th>
            <th>Fecha Competencia</th>
            <th>Tipo Competencia</th>
            <th>Acciones</th>
        </tr>
        <?php while ($competencia = $competencias->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $competencia['id']; ?></td>
                <td><?php echo $competencia['nombre']; ?></td>
                <td><?php echo $competencia['fecha_inicio_inscripcion']; ?></td>
                <td><?php echo $competencia['fecha_fin_inscripcion']; ?></td>
                <td><?php echo $competencia['fecha_compentencia']; ?></td>
                <td><?php echo $competencia['tipo_competencia']; ?></td>
                <td>
                    <a href="vercompetencia.php?id=<?php echo $competencia['id']; ?>">Ver</a>
                    <a href="editarcompetencia.php?id=<?php echo $competencia['id']; ?>">Editar</a>
                    <a href="eliminarcompetencia.php?id=<?php echo $competencia['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

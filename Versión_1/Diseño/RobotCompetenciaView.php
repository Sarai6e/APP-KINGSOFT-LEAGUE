<?php
require_once 'RobotCompetenciaController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new RobotCompetenciaController($db);

// Ver todos los registros de robot_competencia
$robotCompetencias = $controller->index();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robot Competencias</title>
</head>
<body>
    <h1>Robot Competencias</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>ID Robot</th>
            <th>ID Competencia</th>
            <th>Acciones</th>
        </tr>
        <?php while ($robotCompetencia = $robotCompetencias->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $robotCompetencia['id']; ?></td>
                <td><?php echo $robotCompetencia['id_robot']; ?></td>
                <td><?php echo $robotCompetencia['id_competencia']; ?></td>
                <td>
                    <a href="ver_robot_competencia.php?id=<?php echo $robotCompetencia['id']; ?>">Ver</a>
                    <a href="editar_robot_competencia.php?id=<?php echo $robotCompetencia['id']; ?>">Editar</a>
                    <a href="eliminar_robot_competencia.php?id=<?php echo $robotCompetencia['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
?>

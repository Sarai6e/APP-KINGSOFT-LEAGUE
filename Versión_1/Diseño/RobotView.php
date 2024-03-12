<?php
require_once 'RobotController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new RobotController($db);

// Ver todos los robots
$robots = $controller->index();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robots</title>
</head>
<body>
    <h1>Robots</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Peso</th>
            <th>Ancho</th>
            <th>Alto</th>
            <th>Acciones</th>
        </tr>
        <?php while ($robot = $robots->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $robot['id']; ?></td>
                <td><?php echo $robot['nombre']; ?></td>
                <td><?php echo $robot['peso']; ?></td>
                <td><?php echo $robot['ancho']; ?></td>
                <td><?php echo $robot['alto']; ?></td>
                <td>
                    <a href="ver_robot.php?id=<?php echo $robot['id']; ?>">Ver</a>
                    <a href="editar_robot.php?id=<?php echo $robot['id']; ?>">Editar</a>
                    <a href="eliminar_robot.php?id=<?php echo $robot['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

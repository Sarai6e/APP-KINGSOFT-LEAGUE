<?php
require_once 'GradoEstudioController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new GradoEstudioController($db);

// Ver todos los grados de estudio
$grados_estudio = $controller->getAllGradosEstudio();

// Código HTML para mostrar los grados de estudio y opciones para ver, editar y eliminar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grados de Estudio</title>
</head>
<body>
    <h1>Grados de Estudio</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Grado</th>
            <th>Acciones</th>
        </tr>
        <?php while ($grado = $grados_estudio->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $grado['id']; ?></td>
                <td><?php echo $grado['grado']; ?></td>
                <td>
                    <a href="vergrado.php?id=<?php echo $grado['id']; ?>">Ver</a>
                    <a href="editargrado.php?id=<?php echo $grado['id']; ?>">Editar</a>
                    <a href="eliminargrado.php?id=<?php echo $grado['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
require_once 'NombreInstitucionController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new NombreInstitucionController($db);

// Ver todos los nombres de institución
$nombres_institucion = $controller->getAllNombresInstitucion();

// Código HTML para mostrar los nombres de institución y opciones para ver, editar y eliminar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombres de Institución</title>
</head>
<body>
    <h1>Nombres de Institución</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php while ($nombre_institucion = $nombres_institucion->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $nombre_institucion['id']; ?></td>
                <td><?php echo $nombre_institucion['nombre']; ?></td>
                <td>
                    <a href="vernombre.php?id=<?php echo $nombre_institucion['id']; ?>">Ver</a>
                    <a href="editarnombre.php?id=<?php echo $nombre_institucion['id']; ?>">Editar</a>
                    <a href="eliminarnombre.php?id=<?php echo $nombre_institucion['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

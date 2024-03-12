<?php
require_once 'ParticipanteGeneroController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new ParticipanteGeneroController($db);

// Ver todos los géneros de participantes
$participante_genero = $controller->getAllParticipanteGenero();

// Código HTML para mostrar los géneros de participantes y opciones para ver, editar y eliminar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Géneros de Participantes</title>
</head>
<body>
    <h1>Géneros de Participantes</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Género</th>
            <th>Acciones</th>
        </tr>
        <?php while ($genero = $participante_genero->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $genero['id']; ?></td>
                <td><?php echo $genero['genero']; ?></td>
                <td>
                    <a href="vergenero.php?id=<?php echo $genero['id']; ?>">Ver</a>
                    <a href="editargenero.php?id=<?php echo $genero['id']; ?>">Editar</a>
                    <a href="eliminargenero.php?id=<?php echo $genero['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

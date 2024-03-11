<?php
require_once 'ParticipanteController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new ParticipanteController($db);

// Ver todos los participantes
$participantes = $controller->getAllParticipantes();

// Código HTML para mostrar los participantes y opciones para ver, editar y eliminar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes</title>
</head>
<body>
    <h1>Participantes</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>DNI</th>
            <th>Género</th>
            <th>Fecha de Nacimiento</th>
            <th>Correo</th>
            <th>Año de Estudio</th>
            <th>Especialidad</th>
            <th>Grado de Estudio</th>
            <th>ID Club de Robótica</th>
            <th>ID Nombre de Institución</th>
            <th>Acciones</th>
        </tr>
        <?php while ($participante = $participantes->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $participante['id']; ?></td>
                <td><?php echo $participante['nombre']; ?></td>
                <td><?php echo $participante['apellidos']; ?></td>
                <td><?php echo $participante['dni']; ?></td>
                <td><?php echo $participante['genero']; ?></td>
                <td><?php echo $participante['fecha_nacimiento']; ?></td>
                <td><?php echo $participante['correo']; ?></td>
                <td><?php echo $participante['anio_estudio']; ?></td>
                <td><?php echo $participante['especialidad']; ?></td>
                <td><?php echo $participante['grado_estudio']; ?></td>
                <td><?php echo $participante['id_club_robotica']; ?></td>
                <td><?php echo $participante['nombre_institucion_id']; ?></td>
                <td>
                    <a href="verparticipante.php?id=<?php echo $participante['id']; ?>">Ver</a>
                    <a href="editarparticipante.php?id=<?php echo $participante['id']; ?>">Editar</a>
                    <a href="eliminarparticipante.php?id=<?php echo $participante['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

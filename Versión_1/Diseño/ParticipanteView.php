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
            <th>Apellido</th>
            <th>DNI</th>
            <th>Género ID</th>
            <th>Grado Estudio ID</th>
            <th>Año Estudio</th>
            <th>Especialidad</th>
            <th>Correo</th>
            <th>Clave</th>
            <th>Robot ID</th>
            <th>Club Robótica ID</th>
            <th>Fecha Nacimiento</th>
            <th>Acciones</th>
        </tr>
        <?php while ($participante = $participantes->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $participante['id']; ?></td>
                <td><?php echo $participante['nombre']; ?></td>
                <td><?php echo $participante['apellido']; ?></td>
                <td><?php echo $participante['dni']; ?></td>
                <td><?php echo $participante['participante_genero_id']; ?></td>
                <td><?php echo $participante['grado_estudio_id']; ?></td>
                <td><?php echo $participante['año_estudio']; ?></td>
                <td><?php echo $participante['especialidad']; ?></td>
                <td><?php echo $participante['correo']; ?></td>
                <td><?php echo $participante['clave']; ?></td>
                <td><?php echo $participante['robot_id']; ?></td>
                <td><?php echo $participante['club_robotica_id']; ?></td>
                <td><?php echo $participante['fecha_nacimiento']; ?></td>
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

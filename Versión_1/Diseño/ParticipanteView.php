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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Participantes</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
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
            </thead>
            <tbody>
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
                            <a href="verparticipante.php?id=<?php echo $participante['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="editarparticipante.php?id=<?php echo $participante['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminarparticipante.php?id=<?php echo $participante['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="menulogin.html" class="btn btn-secondary">Volver</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

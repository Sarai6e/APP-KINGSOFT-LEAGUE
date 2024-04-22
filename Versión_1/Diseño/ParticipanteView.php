<?php 
include("./app/config.php");
include("./layout/sesion.php");
?>
<?php
require_once 'ParticipanteController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new ParticipanteController($db);

// Ver todos los participantes
$participantes = $controller->getAllParticipantes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table{
            background-color:white;
        }
        .container {
            margin-top: 150px; /* Ajuste del margen superior */
            text-align: center; /* Centrar elementos dentro del contenedor */
        }
        h1{
             color:white;
        }
    </style>
</head>
<body>
<?php 
    include 'navegador.php';
?>
<div class="container">
        <!-- Título y botón de agregar -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mt-4 mb-4">Participantes</h1>
        </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Género</th>
                <th>Grado Estudio</th>
                <th>Año Estudio</th>
                <th>Especialidad</th>
                <th>Correo</th>
                <th>Clave</th>
                <th>Robot</th>
                <th>Club Robótica</th>
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
                    <td><?php echo getGeneroName($participante['participante_genero_id'], $db); ?></td>
                    <td><?php echo getGradoEstudioName($participante['grado_estudio_id'], $db); ?></td>
                    <td><?php echo $participante['año_estudio']; ?></td>
                    <td><?php echo $participante['especialidad']; ?></td>
                    <td><?php echo $participante['correo']; ?></td>
                    <td><?php echo $participante['clave']; ?></td>
                    <td><?php echo getRobotName($participante['robot_id'], $db); ?></td>
                    <td><?php echo getClubRoboticaName($participante['club_robotica_id'], $db); ?></td>
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
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
function getGeneroName($genero_id, $db) {
    $query = "SELECT genero FROM participante_genero WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $genero_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['genero'];
}

function getGradoEstudioName($grado_estudio_id, $db) {
    $query = "SELECT grado FROM grado_estudio WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $grado_estudio_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['grado'];
}

function getRobotName($robot_id, $db) {
    $query = "SELECT nombre FROM robot WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $robot_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['nombre'];
}

function getClubRoboticaName($club_robotica_id, $db) {
    $query = "SELECT nombre FROM club_robotica WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $club_robotica_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['nombre'];
}
?>

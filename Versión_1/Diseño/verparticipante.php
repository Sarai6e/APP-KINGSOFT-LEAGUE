<?php
require_once 'ParticipanteController.php';

// Verificar si se proporcionó un ID válido
if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new ParticipanteController($db);

    $id = trim($_GET['id']);

    // Obtener el participante por ID
    $participante = $controller->getParticipanteById($id);

    if ($participante) {
        echo "<h2>Detalles del Participante</h2>";
        echo "<p><strong>ID:</strong> " . $participante['id'] . "</p>";
        echo "<p><strong>Nombre:</strong> " . $participante['nombre'] . "</p>";
        echo "<p><strong>Apellido:</strong> " . $participante['apellido'] . "</p>";
        echo "<p><strong>DNI:</strong> " . $participante['dni'] . "</p>";
        echo "<p><strong>Participante Género ID:</strong> " . $participante['participante_genero_id'] . "</p>";
        echo "<p><strong>Grado Estudio ID:</strong> " . $participante['grado_estudio_id'] . "</p>";
        echo "<p><strong>Año Estudio:</strong> " . $participante['año_estudio'] . "</p>";
        echo "<p><strong>Especialidad:</strong> " . $participante['especialidad'] . "</p>";
        echo "<p><strong>Correo:</strong> " . $participante['correo'] . "</p>";
        echo "<p><strong>Clave:</strong> " . $participante['clave'] . "</p>";
        echo "<p><strong>Robot ID:</strong> " . $participante['robot_id'] . "</p>";
        echo "<p><strong>Club Robótica ID:</strong> " . $participante['club_robotica_id'] . "</p>";
        echo "<p><strong>Fecha Nacimiento:</strong> " . $participante['fecha_nacimiento'] . "</p>";
        echo "<p><a href='ParticipanteView.php'>Volver a la lista de participantes</a></p>";
    } else {
        echo "No se encontró el participante.";
    }
} else {
    echo "ID de participante no especificado.";
}
?>

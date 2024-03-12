<?php
require_once 'RobotCompetenciaController.php';

// Verificar si se proporcionó un ID válido
if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new RobotCompetenciaController($db);

    $id = trim($_GET['id']);

    // Obtener la competencia del robot por ID
    $robotCompetencia = $controller->getRobotCompetenciaById($id);

    if ($robotCompetencia) {
        echo "<h2>Detalles de la Competencia del Robot</h2>";
        echo "<p><strong>ID:</strong> " . $robotCompetencia['id'] . "</p>";
        echo "<p><strong>ID Robot:</strong> " . $robotCompetencia['id_robot'] . "</p>";
        echo "<p><strong>ID Competencia:</strong> " . $robotCompetencia['id_competencia'] . "</p>";
        echo "<p><a href='RobotCompetenciaView.php'>Volver a la lista de competencias del robot</a></p>";
    } else {
        echo "No se encontró la competencia del robot.";
    }
} else {
    echo "ID de competencia del robot no especificado.";
}
?>

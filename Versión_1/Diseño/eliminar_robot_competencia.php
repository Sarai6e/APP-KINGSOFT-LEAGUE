<?php
require_once 'RobotCompetenciaController.php';

// Verificar si se proporcionó un ID válido
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new RobotCompetenciaController($db);

    $id = trim($_GET["id"]);

    // Eliminar la competencia del robot
    if ($controller->deleteRobotCompetencia($id)) {
        header("location: RobotCompetenciaView.php");
        exit();
    } else {
        echo "Hubo un problema al eliminar la competencia del robot.";
    }
} else {
    echo "ID de competencia del robot no especificado.";
}
?>

<?php
require_once 'RobotController.php';

// Verificar si se proporcionó un ID válido
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new RobotController($db);

    $id = trim($_GET["id"]);

    // Eliminar el robot
    if ($controller->deleteRobot($id)) {
        header("location: ver_robot.php");
        exit();
    } else {
        echo "Hubo un problema al eliminar el robot.";
    }
} else {
    echo "ID de robot no especificado.";
}
?>

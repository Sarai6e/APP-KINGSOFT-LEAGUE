<?php
require_once 'RobotController.php';

// Verificar si se proporcionó un ID válido
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new RobotController($db);

    $id = trim($_GET["id"]);

    // Obtener el robot por ID
    $robot = $controller->getRobotById($id);

    if ($robot) {
        echo "<h2>Detalles del Robot</h2>";
        echo "<p>ID: " . $robot['id'] . "</p>";
        echo "<p>Nombre: " . $robot['nombre'] . "</p>";
        echo "<p>Peso: " . $robot['peso'] . "</p>";
        echo "<p>Ancho: " . $robot['ancho'] . "</p>";
        echo "<p>Alto: " . $robot['alto'] . "</p>";
    } else {
        echo "No se encontró ningún robot con ese ID.";
    }
} else {
    echo "ID de robot no especificado.";
}
?>

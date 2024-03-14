<?php
require_once 'TipoCompetenciaController.php';

// Verificar si se ha proporcionado un ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new TipoCompetenciaController($db);

    // Obtener la información del tipo de competencia
    $tipoCompetencia = $controller->getTipoCompetenciaById($id);

    if ($tipoCompetencia) {
        // Mostrar los detalles del tipo de competencia
        echo "<h2>Detalles del Tipo de Competencia</h2>";
        echo "<p><strong>ID:</strong> {$tipoCompetencia['id']}</p>";
        echo "<p><strong>Nombre:</strong> {$tipoCompetencia['nombre']}</p>";
        echo "<p><strong>Descripción:</strong> {$tipoCompetencia['descripcion']}</p>";
    } else {
        echo "Tipo de competencia no encontrado.";
    }
} else {
    echo "ID de tipo de competencia no proporcionado.";
}
?>

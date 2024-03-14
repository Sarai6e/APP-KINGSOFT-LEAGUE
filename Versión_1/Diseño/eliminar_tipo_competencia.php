<?php
require_once 'TipoCompetenciaController.php';

// Verificar si se ha proporcionado un ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new TipoCompetenciaController($db);

    // Eliminar el tipo de competencia
    if ($controller->deleteTipoCompetencia($id)) {
        echo "Tipo de competencia eliminado correctamente.";
    } else {
        echo "Error al eliminar el tipo de competencia.";
    }
} else {
    echo "ID de tipo de competencia no proporcionado.";
}
?>

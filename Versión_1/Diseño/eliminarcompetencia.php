<?php
require_once 'CompetenciaController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new CompetenciaController($db);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if($controller->deleteCompetencia($id)) {
        echo "Competencia eliminada correctamente.";
    } else {
        echo "Error al eliminar la competencia.";
    }
} else {
    echo "ID de competencia no proporcionado.";
}
?>

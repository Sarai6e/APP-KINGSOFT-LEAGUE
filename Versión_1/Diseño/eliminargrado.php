<?php
require_once 'GradoEstudioController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new GradoEstudioController($db);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if($controller->deleteGradoEstudio($id)) {
        echo "Grado de estudio eliminado correctamente.";
    } else {
        echo "Error al eliminar el grado de estudio.";
    }
} else {
    echo "ID de grado de estudio no proporcionado.";
}
?>

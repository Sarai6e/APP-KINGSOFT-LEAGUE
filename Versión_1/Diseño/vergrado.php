<?php
require_once 'GradoEstudioController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new GradoEstudioController($db);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $grado = $controller->getGradoEstudioById($id);
    if ($grado) {
        echo "Detalles del grado de estudio:";
        print_r($grado);
    } else {
        echo "Grado de estudio no encontrado.";
    }
} else {
    echo "ID de grado de estudio no proporcionado.";
}
?>

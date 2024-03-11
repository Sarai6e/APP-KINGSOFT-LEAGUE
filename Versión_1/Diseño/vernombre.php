<?php
require_once 'NombreInstitucionController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new NombreInstitucionController($db);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $nombre_institucion = $controller->getNombreInstitucionById($id);
    if ($nombre_institucion) {
        echo "Detalles del nombre de la institución:";
        print_r($nombre_institucion);
    } else {
        echo "Nombre de la institución no encontrado.";
    }
} else {
    echo "ID del nombre de la institución no proporcionado.";
}
?>

<?php
require_once 'NombreInstitucionController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new NombreInstitucionController($db);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if($controller->deleteNombreInstitucion($id)) {
        echo "Nombre de la institución eliminado correctamente.";
    } else {
        echo "Error al eliminar el nombre de la institución.";
    }
} else {
    echo "ID del nombre de la institución no proporcionado.";
}
?>

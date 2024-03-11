<?php
require_once 'ClubRoboticaController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new ClubRoboticaController($db);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if($controller->eliminar($id)) {
        echo "Club eliminado correctamente.";
    } else {
        echo "Error al eliminar el club.";
    }
}
?>

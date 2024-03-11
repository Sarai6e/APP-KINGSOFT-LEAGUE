<?php
require_once 'ParticipanteController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new ParticipanteController($db);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if($controller->deleteParticipante($id)) {
        header('Location: ParticipanteView.php');
    } else {
        echo 'Error al eliminar el participante.';
    }
}
?>

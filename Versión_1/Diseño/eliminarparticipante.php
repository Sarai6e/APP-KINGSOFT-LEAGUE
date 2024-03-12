<?php
require_once 'ParticipanteController.php';

// Verificar si se proporcionó un ID válido
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new ParticipanteController($db);

    $id = trim($_GET["id"]);

    // Eliminar el participante
    if ($controller->deleteParticipante($id)) {
        header("location: ParticipanteView.php");
        exit();
    } else {
        echo "Hubo un problema al eliminar el participante.";
    }
} else {
    echo "ID de participante no especificado.";
}
?>

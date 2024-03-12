<?php
require_once 'ParticipanteGeneroController.php';

// Verificar si se proporcionó un ID válido
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new ParticipanteGeneroController($db);

    $id = trim($_GET["id"]);

    // Eliminar el género del participante
    if ($controller->deleteParticipanteGenero($id)) {
        header("location: ParticipanteGeneroView.php");
        exit();
    } else {
        echo "Hubo un problema al eliminar el género del participante.";
    }
} else {
    echo "ID de género del participante no especificado.";
}
?>

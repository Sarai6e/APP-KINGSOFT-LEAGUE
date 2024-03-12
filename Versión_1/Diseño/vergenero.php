<?php
require_once 'ParticipanteGeneroController.php';

// Verificar si se proporcionó un ID válido
if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new ParticipanteGeneroController($db);

    $id = trim($_GET['id']);

    // Obtener el género del participante por ID
    $genero = $controller->getParticipanteGeneroById($id);

    if ($genero) {
        echo "<h2>Detalles del Género del Participante</h2>";
        echo "<p><strong>ID:</strong> " . $genero['id'] . "</p>";
        echo "<p><strong>Género:</strong> " . $genero['genero'] . "</p>";
        echo "<p><a href='ParticipanteGeneroView.php'>Volver a la lista de géneros</a></p>";
    } else {
        echo "No se encontró el género del participante.";
    }
} else {
    echo "ID de género del participante no especificado.";
}
?>

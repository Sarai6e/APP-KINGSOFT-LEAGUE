<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Género del Participante</title>
    <!-- Agregar Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
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
            echo "<p><a href='ParticipanteGeneroView.php' class='btn btn-primary'>Volver a la lista de géneros</a></p>";
        } else {
            echo "<h1>No se encontró el género del participante.</h1>";
        }
    } else {
        echo "<h1>ID de género del participante no especificado.</h1>";
    }
    ?>
</div>

<!-- Agregar Bootstrap JS (Opcional, si lo necesitas) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

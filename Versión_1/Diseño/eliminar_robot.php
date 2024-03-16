<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Robot</title>
    <!-- Agregar Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
        require_once 'RobotController.php';

        // Verificar si se proporcionó un ID válido
        if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
            $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
            $controller = new RobotController($db);

            $id = trim($_GET["id"]);

            // Eliminar el robot
            if ($controller->deleteRobot($id)) {
                echo "<div class='alert alert-success' role='alert'>Robot eliminado correctamente.</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Hubo un problema al eliminar el robot.</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>ID de robot no especificado.</div>";
        }
        ?>
        <!-- Botón de inicio -->
        <a href="RobotView.php" class="btn btn-primary mt-3">Inicio</a>
    </div>

    <!-- Agregar Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Robot</title>
    <!-- Agregar Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
        require_once 'RobotController.php';

        // Verificar si se envió el formulario de edición
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
            $controller = new RobotController($db);

            // Verificar si se proporcionó un ID válido
            if (isset($_POST["id"]) && !empty(trim($_POST["id"]))) {
                $id = trim($_POST["id"]);
                $nombre = trim($_POST["nombre"]);
                $peso = trim($_POST["peso"]);
                $ancho = trim($_POST["ancho"]);
                $alto = trim($_POST["alto"]);

                // Actualizar el robot
                if ($controller->updateRobot($id, $nombre, $peso, $ancho, $alto)) {
                    header("location: ver_robot.php?id=" . $id);
                    exit();
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Hubo un problema al actualizar el robot.</div>";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>ID de robot no especificado.</div>";
            }
        } else {
            // Mostrar el formulario de edición con los datos actuales
            if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
                $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
                $controller = new RobotController($db);

                $id = trim($_GET["id"]);

                // Obtener el robot por ID
                $robot = $controller->getRobotById($id);

                if ($robot) {
        ?>
                    <h2>Editar Robot</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $robot['id']; ?>">
                        <div>
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" value="<?php echo $robot['nombre']; ?>">
                        </div>
                        <div>
                            <label for="peso">Peso:</label>
                            <input type="text" name="peso" value="<?php echo $robot['peso']; ?>">
                        </div>
                        <div>
                            <label for="ancho">Ancho:</label>
                            <input type="text" name="ancho" value="<?php echo $robot['ancho']; ?>">
                        </div>
                        <div>
                            <label for="alto">Alto:</label>
                            <input type="text" name="alto" value="<?php echo $robot['alto']; ?>">
                        </div>
                        <div>
                            <input type="submit" value="Guardar" class="btn btn-primary">
                            <a href="RobotView.php" class="btn btn-secondary">Inicio</a>
                        </div>
                    </form>
        <?php
                } else {
                    echo "<div class='alert alert-warning' role='alert'>No se encontró ningún robot con ese ID.</div>";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>ID de robot no especificado.</div>";
            }
        }
        ?>
    </div>

    <!-- Agregar Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
require_once 'RobotCompetenciaController.php';

// Verificar si se envió el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new RobotCompetenciaController($db);

    // Verificar si se proporcionó un ID válido
    if (isset($_POST["id"]) && !empty(trim($_POST["id"]))) {
        $id = trim($_POST["id"]);
        $id_robot = trim($_POST["id_robot"]);
        $id_competencia = trim($_POST["id_competencia"]);

        // Actualizar la competencia del robot
        if ($controller->updateRobotCompetencia($id, $id_robot, $id_competencia)) {
            header("location: RobotCompetenciaView.php");
            exit();
        } else {
            echo "<div class='alert alert-danger' role='alert'>Hubo un problema al actualizar la competencia del robot.</div>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>ID de competencia del robot no especificado.</div>";
    }
} else {
    // Mostrar el formulario de edición con los datos actuales
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
        $controller = new RobotCompetenciaController($db);

        $id = trim($_GET["id"]);

        // Obtener la competencia del robot por ID
        $robotCompetencia = $controller->getRobotCompetenciaById($id);

        if ($robotCompetencia) {
?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Editar Competencia del Robot</title>
                <!-- Agregar Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <style>
                   .table{
                        background-color:white;
                    }
                    .container {
                        margin-top: 200px; /* Ajuste del margen superior */
                    }
                    label{
                        color:white;
                    }
                    h2{
                         color:white;
                    }
                </style>
            </head>
            <body>
            <?php 
                include 'navegador.php'
            ?>
            <div class="container">
                <h2>Editar Competencia del Robot</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $robotCompetencia['id']; ?>">
                    <div class="mb-3">
                        <label for="id_robot" class="form-label">ID Robot:</label>
                        <input type="text" class="form-control" id="id_robot" name="id_robot" value="<?php echo $robotCompetencia['id_robot']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="id_competencia" class="form-label">ID Competencia:</label>
                        <input type="text" class="form-control" id="id_competencia" name="id_competencia" value="<?php echo $robotCompetencia['id_competencia']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="RobotCompetenciaView.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>

            <!-- Agregar Bootstrap JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </body>
            </html>
<?php
        } else {
            echo "<div class='alert alert-warning' role='alert'>No se encontró la competencia del robot.</div>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>ID de competencia del robot no especificado.</div>";
    }
}
?>

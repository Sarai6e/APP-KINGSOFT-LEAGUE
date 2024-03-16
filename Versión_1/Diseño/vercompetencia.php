<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Competencia</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
        require_once 'CompetenciaController.php';

        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
        $controller = new CompetenciaController($db);

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $competencia = $controller->getCompetenciaById($id);
            echo "<h1 class='mt-3'>Detalles de la competencia:</h1>";
            if ($competencia) {
                echo "<div class='card mt-3'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>ID: " . $competencia['id'] . "</h5>";
                echo "<p class='card-text'>Nombre: " . $competencia['nombre'] . "</p>";
                echo "<p class='card-text'>Fecha Inicio Inscripción: " . $competencia['fecha_inicio_inscripcion'] . "</p>";
                echo "<p class='card-text'>Fecha Fin Inscripción: " . $competencia['fecha_fin_inscripcion'] . "</p>";
                echo "<p class='card-text'>Fecha Competencia: " . $competencia['fecha_compentencia'] . "</p>";
                echo "<p class='card-text'>Tipo Competencia: " . $competencia['tipo_competencia'] . "</p>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div class='alert alert-danger mt-3' role='alert'>Competencia no encontrada.</div>";
            }
        } else {
            echo "<div class='alert alert-warning mt-3' role='alert'>ID de competencia no proporcionado.</div>";
        }
        ?>
        <!-- Botón para regresar al inicio -->
        <a href="competenciaView.php" class="btn btn-primary mt-3">Regresar al Inicio</a>
    </div>
    <!-- Scripts de Bootstrap (jQuery primero, luego Popper.js, luego Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

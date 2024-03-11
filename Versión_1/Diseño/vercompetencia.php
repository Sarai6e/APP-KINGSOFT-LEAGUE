<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Competencia</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TtC2G1fV9ZPSwb6jU5v2nS3Ih9paJwbjz4WTf3K1nLBu+xskxu5yy2Q+n5PbkJb1" crossorigin="anonymous">
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
    </div>
    <!-- Scripts de Bootstrap (jQuery primero, luego Popper.js, luego Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z5v6QvhxyE8t8A7wggpHJ1R0L/20Fdf5G5XdEf" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha384-3d3Jv2dD5stcivLnkFsv8N28s8/cJQETrDQcWr57B4GOnfUz6E+JzV5S0F7s3PWJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-rDr8i+vzfQ2N7c8mX+JAKbIpB/1DsdqzuZ18NEpoEwz2cgE+JqG8MIxqv5U8i6vG" crossorigin="anonymous"></script>
</body>
</html>

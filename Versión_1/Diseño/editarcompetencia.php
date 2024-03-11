<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Competencia</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TtC2G1fV9ZPSwb6jU5v2nS3Ih9paJwbjz4WTf3K1nLBu+xskxu5yy2Q+n5PbkJb1" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php
        require_once 'CompetenciaController.php';

        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
        $controller = new CompetenciaController($db);

        if(isset($_POST['submit'])) {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $fecha_inicio_inscripcion = $_POST['fecha_inicio_inscripcion'];
            $fecha_fin_inscripcion = $_POST['fecha_fin_inscripcion'];
            $fecha_compentencia = $_POST['fecha_compentencia'];
            $tipo_competencia = $_POST['tipo_competencia'];

            if($controller->updateCompetencia($id, $nombre, $fecha_inicio_inscripcion, $fecha_fin_inscripcion, $fecha_compentencia, $tipo_competencia)) {
                echo "<div class='alert alert-success' role='alert'>Competencia actualizada correctamente.</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error al actualizar la competencia.</div>";
            }
        }

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $competencia = $controller->getCompetenciaById($id);
            if ($competencia) {
        ?>
                <h1 class="mt-3">Actualizar Competencia</h1>
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $competencia['id']; ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $competencia['nombre']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_inicio_inscripcion" class="form-label">Fecha Inicio Inscripción:</label>
                        <input type="date" class="form-control" id="fecha_inicio_inscripcion" name="fecha_inicio_inscripcion" value="<?php echo $competencia['fecha_inicio_inscripcion']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_fin_inscripcion" class="form-label">Fecha Fin Inscripción:</label>
                        <input type="date" class="form-control" id="fecha_fin_inscripcion" name="fecha_fin_inscripcion" value="<?php echo $competencia['fecha_fin_inscripcion']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_compentencia" class="form-label">Fecha Competencia:</label>
                        <input type="date" class="form-control" id="fecha_compentencia" name="fecha_compentencia" value="<?php echo $competencia['fecha_compentencia']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tipo_competencia" class="form-label">Tipo Competencia:</label>
                        <input type="text" class="form-control" id="tipo_competencia" name="tipo_competencia" value="<?php echo $competencia['tipo_competencia']; ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Actualizar</button>
                </form>
        <?php
            } else {
                echo "<div class='alert alert-warning' role='alert'>Competencia no encontrada.</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>ID de competencia no proporcionado.</div>";
        }
        ?>
    </div>
    <!-- Scripts de Bootstrap (jQuery primero, luego Popper.js, luego Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z5v6QvhxyE8t8A7wggpHJ1R0L/20Fdf5G5XdEf" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha384-3d3Jv2dD5stcivLnkFsv8N28s8/cJQETrDQcWr57B4GOnfUz6E+JzV5S0F7s3PWJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-rDr8i+vzfQ2N7c8mX+JAKbIpB/1DsdqzuZ18NEpoEwz2cgE+JqG8MIxqv5U8i6vG" crossorigin="anonymous"></script>
</body>
</html>

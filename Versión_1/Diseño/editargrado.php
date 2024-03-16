<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Grado de Estudio</title>
    <!-- Agregar Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
        require_once 'GradoEstudioController.php';

        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
        $controller = new GradoEstudioController($db);

        if(isset($_POST['submit'])) {
            $id = $_POST['id'];
            $grado = $_POST['grado'];

            if($controller->updateGradoEstudio($id, $grado)) {
                echo "<div class='alert alert-success' role='alert'>Grado de estudio actualizado correctamente.</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error al actualizar el grado de estudio.</div>";
            }
        }

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $grado = $controller->getGradoEstudioById($id);
            if ($grado) {
        ?>
                <h1>Actualizar Grado de Estudio</h1>
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $grado['id']; ?>">
                    <div class="form-group">
                        <label for="grado">Grado:</label>
                        <input type="text" class="form-control" id="grado" name="grado" value="<?php echo $grado['grado']; ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Actualizar</button>
                </form>
        <?php
            } else {
                echo "<div class='alert alert-warning' role='alert'>Grado de estudio no encontrado.</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>ID de grado de estudio no proporcionado.</div>";
        }
        ?>

        <!-- Botón de inicio -->
        <a href="GradoEstudioView.php" class="btn btn-secondary mt-3">Inicio</a>
    </div>

    <!-- Agregar Bootstrap JS (Opcional, si lo necesitas) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

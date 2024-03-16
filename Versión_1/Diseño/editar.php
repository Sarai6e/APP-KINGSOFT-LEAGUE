<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Club</title>
    <!-- Agregar Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
        require_once 'ClubRoboticaController.php';

        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
        $controller = new ClubRoboticaController($db);

        if(isset($_POST['submit'])) {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $ciudad = $_POST['ciudad'];
            $pais = $_POST['pais'];
            if($controller->editar($id, $nombre, $ciudad, $pais)) {
                echo "<div class='alert alert-success' role='alert'>Club actualizado correctamente.</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error al actualizar el club.</div>";
            }
        }

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $club = $controller->ver($id);
            // Aquí puedes mostrar un formulario prellenado con los datos del club
        ?>
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $club['id']; ?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $club['nombre']; ?>">
                </div>
                <div class="mb-3">
                    <label for="ciudad" class="form-label">Ciudad:</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo $club['ciudad']; ?>">
                </div>
                <div class="mb-3">
                    <label for="pais" class="form-label">País:</label>
                    <input type="text" class="form-control" id="pais" name="pais" value="<?php echo $club['pais']; ?>">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Actualizar</button>
            </form>
        <?php
        }
        ?>

        <!-- Botón para regresar al inicio -->
        <a href="ClubRoboticaView.php" class="btn btn-secondary mt-3">Inicio</a>
    </div>

    <!-- Agregar Bootstrap JS (Opcional, si lo necesitas) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

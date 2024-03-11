<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Club</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TtC2G1fV9ZPSwb6jU5v2nS3Ih9paJwbjz4WTf3K1nLBu+xskxu5yy2Q+n5PbkJb1" crossorigin="anonymous">
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

    <!-- Scripts de Bootstrap (jQuery primero, luego Popper.js, luego Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z5v6QvhxyE8t8A7wggpHJ1R0L/20Fdf5G5XdEf" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha384-3d3Jv2dD5stcivLnkFsv8N28s8/cJQETrDQcWr57B4GOnfUz6E+JzV5S0F7s3PWJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-rDr8i+vzfQ2N7c8mX+JAKbIpB/1DsdqzuZ18NEpoEwz2cgE+JqG8MIxqv5U8i6vG" crossorigin="anonymous"></script>
</body>
</html>


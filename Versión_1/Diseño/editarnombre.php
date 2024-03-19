<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Nombre de Institución</title>
    <!-- Agregar Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table{
            background-color:white;
        }
        .container {
            margin-top: 200px; /* Ajuste del margen superior */
        }
        .form-label{
            color:white;
        }
        h1{
             color:white;
        }
    </style>
</head>
<body>
<?php 
    include 'navegador.php'
    ?>
    <div class="container">
        <?php
        require_once 'NombreInstitucionController.php';

        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
        $controller = new NombreInstitucionController($db);

        if(isset($_POST['submit'])) {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];

            if($controller->updateNombreInstitucion($id, $nombre)) {
                echo "<div class='alert alert-success' role='alert'>Nombre de la institución actualizado correctamente.</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error al actualizar el nombre de la institución.</div>";
            }
        }

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $nombre_institucion = $controller->getNombreInstitucionById($id);
            if ($nombre_institucion) {
        ?>
                <h1>Actualizar Nombre de Institución</h1>
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $nombre_institucion['id']; ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre_institucion['nombre']; ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Actualizar</button>
                </form>
        <?php
            } else {
                echo "<div class='alert alert-warning' role='alert'>Nombre de la institución no encontrado.</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>ID del nombre de la institución no proporcionado.</div>";
        }
        ?>

        <!-- Botón de inicio -->
        <a href="NombreInstitucionView.php" class="btn btn-secondary mt-3">Regrsar</a>
    </div>

    <!-- Agregar Bootstrap JS (Opcional, si lo necesitas) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

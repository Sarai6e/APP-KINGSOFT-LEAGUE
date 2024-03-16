<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Club</title>
    <!-- Agregamos los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
        require_once 'ClubRoboticaController.php';

        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
        $controller = new ClubRoboticaController($db);

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $club = $controller->ver($id);
            // Aquí puedes mostrar los detalles del club
            echo "<h1 class='mt-3'>Detalles del club:</h1>";
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered mt-3'>";
            foreach ($club as $key => $value) {
                echo "<tr>";
                echo "<th scope='row'>$key</th>";
                echo "<td>$value</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        ?>

        <!-- Botón para regresar al inicio -->
        <a href="clubRoboticaView.php" class="btn btn-primary mt-3">Regresar al Inicio</a>
    </div>

    <!-- Agregamos el archivo JavaScript de Bootstrap (opcional, solo si necesitas funcionalidades de Bootstrap) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

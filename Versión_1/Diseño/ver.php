<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Club</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TtC2G1fV9ZPSwb6jU5v2nS3Ih9paJwbjz4WTf3K1nLBu+xskxu5yy2Q+n5PbkJb1" crossorigin="anonymous">
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

    <!-- Scripts de Bootstrap (jQuery primero, luego Popper.js, luego Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z5v6QvhxyE8t8A7wggpHJ1R0L/20Fdf5G5XdEf" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha384-3d3Jv2dD5stcivLnkFsv8N28s8/cJQETrDQcWr57B4GOnfUz6E+JzV5S0F7s3PWJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-rDr8i+vzfQ2N7c8mX+JAKbIpB/1DsdqzuZ18NEpoEwz2cgE+JqG8MIxqv5U8i6vG" crossorigin="anonymous"></script>
</body>
</html>

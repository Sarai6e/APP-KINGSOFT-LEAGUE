<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Competencia del Robot</title>
    <!-- Agregar Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 200px; /* Ajuste del margen superior */
      background-color: #fff;
      padding: 100px 50px; /* Relleno superior e inferior reducido */
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      color: #343a40;
      margin-bottom: 20px;
    }
    p {
      color: #6c757d;
    }
  </style>
</head>
<body>
<?php 
    include 'navegador.php'
    ?>
<div class="container mt-5">
    <?php
    require_once 'RobotCompetenciaController.php';

    // Verificar si se proporcionó un ID válido
    if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
        $controller = new RobotCompetenciaController($db);

        $id = trim($_GET['id']);

        // Obtener la competencia del robot por ID
        $robotCompetencia = $controller->getRobotCompetenciaById($id);

        if ($robotCompetencia) {
            echo "<h2>Detalles de la Competencia del Robot</h2>";
            echo "<p><strong>ID:</strong> " . $robotCompetencia['id'] . "</p>";
            echo "<p><strong>ID Robot:</strong> " . $robotCompetencia['id_robot'] . "</p>";
            echo "<p><strong>ID Competencia:</strong> " . $robotCompetencia['id_competencia'] . "</p>";
            echo "<p><a href='RobotCompetenciaView.php' class='btn btn-primary'>Regresar</a></p>";
        } else {
            echo "<h1>No se encontró la competencia del robot.</h1>";
        }
    } else {
        echo "<h1>ID de competencia del robot no especificado.</h1>";
    }
    ?>
</div>

<!-- Agregar Bootstrap JS (Opcional, si lo necesitas) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

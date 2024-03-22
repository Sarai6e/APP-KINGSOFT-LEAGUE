<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles del Grado de Estudio</title>
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
  require_once 'GradoEstudioController.php';

  $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
  $controller = new GradoEstudioController($db);

  if(isset($_GET['id'])) {
      $id = $_GET['id'];
      $grado = $controller->getGradoEstudioById($id);
      if ($grado) {
          echo "<h1>Detalles del grado de estudio:</h1>";
          echo "<p>ID: {$grado['id']}</p>";
          echo "<p>Grado: {$grado['grado']}</p>";
      } else {
          echo "<h1>Grado de estudio no encontrado.</h1>";
      }
  } else {
      echo "<h1>ID de grado de estudio no proporcionado.</h1>";
  }
  ?>
  <!-- Botón para volver al inicio -->
  <a href="GradoEstudioView.php" class="btn btn-primary mt-3">Regresar</a>
</div>

<!-- Agregar Bootstrap JS (Opcional, si lo necesitas) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

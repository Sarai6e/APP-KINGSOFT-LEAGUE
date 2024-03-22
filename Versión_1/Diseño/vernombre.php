<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles del Nombre de la Institución</title>
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
  require_once 'NombreInstitucionController.php';

  $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
  $controller = new NombreInstitucionController($db);

  if(isset($_GET['id'])) {
      $id = $_GET['id'];
      $nombre_institucion = $controller->getNombreInstitucionById($id);
      if ($nombre_institucion) {
          echo "<h1>Detalles del nombre de la institución:</h1>";
          echo "<p>ID: {$nombre_institucion['id']}</p>";
          echo "<p>Nombre: {$nombre_institucion['nombre']}</p>";
      } else {
          echo "<h1>Nombre de la institución no encontrado.</h1>";
      }
  } else {
      echo "<h1>ID del nombre de la institución no proporcionado.</h1>";
  }
  ?>
  <!-- Botón para volver al inicio -->
  <a href="NombreInstitucionView.php" class="btn btn-primary mt-3">Volver al inicio</a>
</div>

<!-- Agregar Bootstrap JS (Opcional, si lo necesitas) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
include("./app/config.php");
include("./layout/sesion.php");

// Verifica si se proporcionó un ID válido en la URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: robots.php");
    exit();
}

$id = $_GET['id'];

require_once 'RobotController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', ''); // Conexión a la base de datos
$controller = new RobotController($db);

// Obtener los datos del robot por su ID
$robot = $controller->getRobotById($id);

// Verificar si el robot existe
if (!$robot) {
    echo "Robot no encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Robot</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
<?php include 'navegador.php'; ?>
<div class="container">
    <h1 class="mt-4 mb-4">Ver Robot</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td><?php echo $robot['id']; ?></td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td><?php echo $robot['nombre']; ?></td>
                </tr>
                <tr>
                    <th>Peso</th>
                    <td><?php echo $robot['peso']; ?></td>
                </tr>
                <tr>
                    <th>Ancho</th>
                    <td><?php echo $robot['ancho']; ?></td>
                </tr>
                <tr>
                    <th>Alto</th>
                    <td><?php echo $robot['alto']; ?></td>
                </tr>
            </table>
            <a href="RobotView.php" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
</body>
</html>

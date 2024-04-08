<?php
include("./app/config.php");
include("./layout/sesion.php");

// Verifica si se proporcionó un ID válido en la URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: inscripcion_view.php");
    exit();
}

$id = $_GET['id'];

require_once 'Inscripcion_Controller.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', ''); // Conexión a la base de datos
$controller = new InscripcionController($db);

// Obtener los datos de la inscripción por su ID
$inscripcion = $controller->getInscripcionById($id);

// Verificar si la inscripción existe
if (!$inscripcion) {
    echo "Inscripción no encontrada.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Inscripción</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="style.css">
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
<?php include 'navegador.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <h1 class="mt-4 mb-4">Ver Inscripción</h1>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td><?php echo $inscripcion['id']; ?></td>
                </tr>
                <tr>
                    <th>ID Categoría de Competencia</th>
                    <td><?php echo $inscripcion['id_categoria_competencia']; ?></td>
                </tr>
                <tr>
                    <th>ID Robot</th>
                    <td><?php echo $inscripcion['id_robot']; ?></td>
                </tr>
                <tr>
                    <th>Boucher</th>
                    <td><?php echo $inscripcion['boucher']; ?></td>
                </tr>
                <tr>
                    <th>Confirmación</th>
                    <td><?php echo $inscripcion['confirmacion']; ?></td>
                </tr>
                <tr>
                    <th>Puntaje</th>
                    <td><?php echo $inscripcion['puntaje']; ?></td>
                </tr>
                <tr>
                    <th>Posición</th>
                    <td><?php echo $inscripcion['posicion']; ?></td>
                </tr>
                <tr>
                    <th>Descalificación</th>
                    <td><?php echo $inscripcion['descalificacion']; ?></td>
                </tr>
            </table>
            <a href="inscripcion_view.php" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
</body>
</html>

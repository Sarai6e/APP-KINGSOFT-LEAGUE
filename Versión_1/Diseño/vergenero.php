<?php
include("./app/config.php");
include("./layout/sesion.php");

// Verifica si se proporcionó un ID válido en la URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: participante_genero.php");
    exit();
}

$id = $_GET['id'];

require_once 'ParticipanteGeneroController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', ''); // Conexión a la base de datos
$controller = new ParticipanteGeneroController($db);

// Obtener los datos del género de participante por su ID
$genero = $controller->getParticipanteGeneroById($id);

// Verificar si el género existe
if (!$genero) {
    echo "Género de participante no encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Género de Participante</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <h1 class="mt-4 mb-4">Ver Género de Participante</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td><?php echo $genero['id']; ?></td>
                </tr>
                <tr>
                    <th>Género</th>
                    <td><?php echo $genero['genero']; ?></td>
                </tr>
            </table>
            <a href="ParticipanteGeneroView.php" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
</body>
</html>

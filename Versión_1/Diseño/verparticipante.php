<?php
include("./app/config.php");
include("./layout/sesion.php");

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: participantes.php");
    exit();
}

$id = $_GET['id'];

require_once 'ParticipanteController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new ParticipanteController($db);

$participante = $controller->getParticipanteById($id);

if (!$participante) {
    echo "Participante no encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Participante</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navegador.php'; ?>
<div class="container">
    <h1 class="mt-4 mb-4">Ver Participante</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td><?php echo $participante['id']; ?></td>
                </tr>
                <!-- Agrega aquí más filas para mostrar los datos del participante -->
            </table>
            <a href="participantes.php" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
</body>
</html>

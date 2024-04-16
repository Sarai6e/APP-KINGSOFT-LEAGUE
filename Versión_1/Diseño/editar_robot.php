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

// Si el formulario se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realizar la actualización del robot
    $nombre = $_POST['nombre'];
    $peso = $_POST['peso'];
    $ancho = $_POST['ancho'];
    $alto = $_POST['alto'];

    $result = $controller->updateRobot($id, $nombre, $peso, $ancho, $alto);

    if ($result) {
        header("Location: ver_robot.php?id=" . $id);
        exit();
    } else {
        echo "Error al actualizar el robot.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Robot</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       .table{
            background-color:white;
        }
        .container {
            margin-top: 200px; /* Ajuste del margen superior */
        }
        label{
            color:white;
        }
        h2{
             color:white;
        }
    </style>
</head>
<body>
<?php include 'navegador.php'; ?>
<div class="container">

    <div class="row">
        <div class="col-md-6 offset-md-3">
        <h1 class="mt-4 mb-4">Editar Robot</h1>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $robot['nombre']; ?>">
                </div>
                <div class="form-group">
                    <label>Peso</label>
                    <input type="text" class="form-control" name="peso" value="<?php echo $robot['peso']; ?>">
                </div>
                <div class="form-group">
                    <label>Ancho</label>
                    <input type="text" class="form-control" name="ancho" value="<?php echo $robot['ancho']; ?>">
                </div>
                <div class="form-group">
                    <label>Alto</label>
                    <input type="text" class="form-control" name="alto" value="<?php echo $robot['alto']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="ver_robot.php?id=<?php echo $id; ?>" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

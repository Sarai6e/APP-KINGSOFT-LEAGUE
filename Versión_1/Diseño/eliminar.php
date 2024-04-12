<?php
include("./app/config.php");
include("./layout/sesion.php");

// Verifica si se proporcionó un ID válido en la URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: club_robotica_view.php");
    exit();
}

$id = $_GET['id'];

require_once 'ClubRoboticaController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', ''); // Conexión a la base de datos
$controller = new ClubRoboticaController($db);

// Si el formulario se envió (confirmación de eliminación)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realizar la eliminación del club de robótica
    $result = $controller->deleteClub($id);

    if ($result) {
        header("Location: club_robotica_view.php");
        exit();
    } else {
        echo "Error al eliminar el club de robótica.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Club de Robótica</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navegador.php'; ?>
<div class="container">
    <h1 class="mt-4 mb-4">Eliminar Club de Robótica</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <p>¿Estás seguro de que quieres eliminar este club de robótica?</p>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <a href="ver.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php
include("./app/config.php");
include("./layout/sesion.php");

// Verifica si se proporcionó un ID válido en la URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: tipo_competencias.php");
    exit();
}

$id = $_GET['id'];

require_once 'TipoCompetenciaController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', ''); // Conexión a la base de datos
$controller = new TipoCompetenciaController(new TipoCompetenciaModel($db));

// Si el formulario se envió (confirmación de eliminación)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realizar la eliminación del tipo de competencia
    $result = $controller->deleteTipoCompetencia($id);

    if ($result) {
        header("Location: tipo_competencias.php");
        exit();
    } else {
        echo "Error al eliminar el tipo de competencia.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Tipo de Competencia</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php include 'navegador.php'; ?>
<div class="container">
    <h1 class="mt-4 mb-4">Eliminar Tipo de Competencia</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <p>¿Estás seguro de que quieres eliminar este tipo de competencia?</p>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <a href="ver_tipo_competencia.php"  class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>


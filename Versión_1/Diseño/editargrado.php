<?php
include("./app/config.php");
include("./layout/sesion.php");

// Verifica si se proporcionó un ID válido en la URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: grados_estudio.php");
    exit();
}

$id = $_GET['id'];

require_once 'GradoEstudioController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', ''); // Conexión a la base de datos
$controller = new GradoEstudioController($db);

// Obtener los datos del grado de estudio por su ID
$grado_estudio = $controller->getGradoEstudioById($id);

// Verificar si el grado de estudio existe
if (!$grado_estudio) {
    echo "Grado de estudio no encontrado.";
    exit();
}

// Si el formulario se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realizar la actualización del grado de estudio
    $grado = $_POST['grado'];

    $result = $controller->updateGradoEstudio($id, $grado);

    if ($result) {
        header("Location: vergrado.php?id=" . $id);
        exit();
    } else {
        echo "Error al actualizar el grado de estudio.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Grado de Estudio</title>
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
    <h1 class="mt-4 mb-4">Editar Grado de Estudio</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
                <div class="form-group">
                    <label>Grado</label>
                    <input type="text" class="form-control" name="grado" value="<?php echo $grado_estudio['grado']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="vergrado.php?id=<?php echo $id; ?>" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

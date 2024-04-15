<?php
include("./app/config.php");
include("./layout/sesion.php");

// Verifica si se proporcionó un ID válido en la URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: nombres_institucion.php");
    exit();
}

$id = $_GET['id'];

require_once 'NombreInstitucionController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', ''); // Conexión a la base de datos
$controller = new NombreInstitucionController($db);

// Obtener los datos de la institución por su ID
$institucion = $controller->getInstitucionById($id);

// Verificar si la institución existe
if (!$institucion) {
    echo "Nombre de institución no encontrado.";
    exit();
}

// Si el formulario se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realizar la actualización del nombre de institución
    $nombre = $_POST['nombre'];

    $result = $controller->updateNombreInstitucion($id, $nombre);

    if ($result) {
        header("Location: vernombre.php?id=" . $id);
        exit();
    } else {
        echo "Error al actualizar el nombre de institución.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nombre de Institución</title>
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
        h1{
             color:white;
        }
    </style>
</head>
<body>
<?php include 'navegador.php'; ?>
<div class="container">
    <h1 class="mt-4 mb-4">Editar Nombre de Institución</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $institucion['nombre']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="vernombre.php?id=<?php echo $id; ?>" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

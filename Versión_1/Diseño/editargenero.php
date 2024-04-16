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

// Si el formulario se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realizar la actualización del género de participante
    $nuevoGenero = $_POST['genero'];

    $result = $controller->updateParticipanteGenero($id, $nuevoGenero);

    if ($result) {
        header("Location: vergenero.php?id=" . $id);
        exit();
    } else {
        echo "Error al actualizar el género de participante.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Género de Participante</title>
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
    <h1 class="mt-4 mb-4">Editar Género de Participante</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
                <div class="form-group">
                    <label>Género</label>
                    <input type="text" class="form-control" name="genero" value="<?php echo $genero['genero']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="vergenero.php?id=<?php echo $id; ?>" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

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

// Si el formulario se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realizar la actualización de la inscripción
    $id_categoria_competencia = $_POST['id_categoria_competencia'];
    $id_robot = $_POST['id_robot'];
    $puntaje = $_POST['puntaje'];
    $posicion = $_POST['posicion'];
    $descalificacion = $_POST['descalificacion'];

    $result = $controller->updateInscripcion($id, $id_categoria_competencia, $id_robot, $inscripcion['boucher'], $inscripcion['confirmacion'], $puntaje, $posicion, $descalificacion);

    if ($result) {
        header("Location: ver_inscripcion.php?id=" . $id);
        exit();
    } else {
        echo "Error al actualizar la inscripción.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inscripción</title>
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
        <h1 class="mt-4 mb-4" style="color: white;">Editar Inscripción</h1>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
                <div class="form-group">
                    <label>ID Categoría de Competencia</label>
                    <input type="text" class="form-control" name="id_categoria_competencia" value="<?php echo $inscripcion['id_categoria_competencia']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>ID Robot</label>
                    <input type="text" class="form-control" name="id_robot" value="<?php echo $inscripcion['id_robot']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Puntaje</label>
                    <input type="text" class="form-control" name="puntaje" value="<?php echo $inscripcion['puntaje']; ?>">
                </div>
                <div class="form-group">
                    <label>Posición</label>
                    <input type="text" class="form-control" name="posicion" value="<?php echo $inscripcion['posicion']; ?>">
                </div>
                <div class="form-group">
                    <label>Descalificación</label>
                    <select class="form-control" name="descalificacion">
                        <option value="Si" <?php if ($inscripcion['descalificacion'] == 'Si') echo 'selected'; ?>>Si</option>
                        <option value="No" <?php if ($inscripcion['descalificacion'] == 'No') echo 'selected'; ?>>No</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="ver_inscripcion.php?id=<?php echo $id; ?>" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

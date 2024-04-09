<?php
include("./app/config.php");
include("./layout/sesion.php");

// Verifica si se proporcionó un ID válido en la URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: categoria_competencia_view.php");
    exit();
}

$id = $_GET['id'];

require_once 'Categoria_Competencia_Controller.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', ''); // Conexión a la base de datos
$controller = new CategoriaCompetenciaController($db);

// Obtener los datos de la categoría de competencia por su ID
$categoria = $controller->getCategoriaCompetenciaById($id);

// Verificar si la categoría de competencia existe
if (!$categoria) {
    echo "Categoría de competencia no encontrada.";
    exit();
}

// Si el formulario se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realizar la actualización de la categoría de competencia
    $id_tipo_competencia = $_POST['id_tipo_competencia'];
    $id_categoria_jugador = $_POST['id_categoria_jugador'];
    $reglas = $_POST['reglas'];
    $precio = $_POST['precio'];

    $result = $controller->updateCategoriaCompetencia($id, $id_tipo_competencia, $id_categoria_jugador, $reglas, $precio);

    if ($result) {
        header("Location: ver_categoria_competencia.php?id=" . $id);
        exit();
    } else {
        echo "Error al actualizar la categoría de competencia.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría de Competencia</title>
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
        <h1 class="mt-4 mb-4">Editar Categoría de Competencia</h1>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
                <div class="form-group">
                    <label>ID Tipo de Competencia</label>
                    <input type="text" class="form-control" name="id_tipo_competencia" value="<?php echo $categoria['id_tipo_competencia']; ?>">
                </div>
                <div class="form-group">
                    <label>ID Categoría de Jugador</label>
                    <input type="text" class="form-control" name="id_categoria_jugador" value="<?php echo $categoria['id_categoria_jugador']; ?>">
                </div>
                <div class="form-group">
                    <label>Reglas</label>
                    <input type="text" class="form-control" name="reglas" value="<?php echo $categoria['reglas']; ?>">
                </div>
                <div class="form-group">
                    <label>Precio</label>
                    <input type="text" class="form-control" name="precio" value="<?php echo $categoria['precio']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="ver_categoria_competencia.php?id=<?php echo $id; ?>" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Categoría de Competencia</title>
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
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <h1 class="mt-4 mb-4">Ver Categoría de Competencia</h1>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td><?php echo $categoria['id_competencia']; ?></td>
                </tr>
                <tr>
                    <th>ID Tipo de Competencia</th>
                    <td><?php echo $categoria['id_tipo_competencia']; ?></td>
                </tr>
                <tr>
                    <th>ID Categoría de Jugador</th>
                    <td><?php echo $categoria['id_categoria_jugador']; ?></td>
                </tr>
                <tr>
                    <th>Reglas</th>
                    <td><?php echo $categoria['reglas']; ?></td>
                </tr>
                <tr>
                    <th>Precio</th>
                    <td><?php echo $categoria['precio']; ?></td>
                </tr>
            </table>
            <a href="categoria_competencia_view.php" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
</body>
</html>

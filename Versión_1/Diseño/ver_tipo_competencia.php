<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Tipo de Competencia</title>
    <!-- Agregar Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <?php
    require_once 'TipoCompetenciaController.php';

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
        $controller = new TipoCompetenciaController(new TipoCompetenciaModel($db));

        $id = $_GET['id'];
        $tipoCompetencia = $controller->getTipoCompetencia($id);

        if($tipoCompetencia) {
            echo "<h2>Detalles del Tipo de Competencia</h2>";
            echo "ID: " . $tipoCompetencia['id'] . "<br>";
            echo "Nombre: " . $tipoCompetencia['nombre'] . "<br>";
            echo "Descripción: " . $tipoCompetencia['descripcion'] . "<br>";
            echo "<a href='TipocompetenciaView.php' class='btn btn-primary mt-3'>Volver al inicio</a>";
        } else {
            echo "<h1>Tipo de competencia no encontrado.</h1>";
        }
    } else {
        echo "<h1>ID de tipo de competencia no proporcionado.</h1>";
    }
    ?>
</div>

<!-- Agregar Bootstrap JS (Opcional, si lo necesitas) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

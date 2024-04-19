<?php
include("./app/config.php");
include("./layout/sesion.php");

require_once 'Inscripcion_Controller.php';

// Verificar si se ha enviado un ID de inscripción
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', ''); // Conexión a la base de datos
    $controller = new InscripcionController($db);

    // Obtener la inscripción por su ID
    $inscripcion = $controller->getInscripcionById($id);

    // Verificar si la inscripción existe
    if($inscripcion) {
        // Obtener la ruta de la imagen asociada a la inscripción (ajusta esto según cómo almacenas las imágenes)
        $imagen = 'ruta/directorio/' . $inscripcion['imagen']; // Cambia 'ruta/directorio/' según la ubicación real de tus imágenes
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Inscripción</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilos adicionales según sea necesario */
    </style>
</head>
<body>
<?php include 'navegador.php'; ?>
<div class="container">
    <h1 class="mt-4 mb-4">Confirmar Inscripción</h1>
    <!-- Mostrar la imagen asociada a la inscripción -->
    <img src="<?php echo $imagen; ?>" alt="Imagen de inscripción" class="img-fluid mb-4">

    <!-- Formulario de confirmación -->
    <form action="confirmar_inscripcion_proceso.php" method="POST">
        <input type="hidden" name="id_inscripcion" value="<?php echo $inscripcion['id']; ?>">
        <!-- Opción para confirmar la inscripción -->
        <button type="submit" name="confirmar" class="btn btn-success">Confirmar Inscripción</button>
        <!-- Opción para cancelar -->
        <a href="cancelar_inscripcion.php?id=<?php echo $inscripcion['id']; ?>" class="btn btn-danger">Cancelar</a>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
    } else {
        echo "La inscripción no existe.";
    }
} else {
    echo "ID de inscripción no proporcionado.";
}
?>

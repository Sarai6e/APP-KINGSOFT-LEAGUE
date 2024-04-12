<?php
include("./app/config.php");
include("./layout/sesion.php");

// Verifica si se proporcionó un ID válido en la URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: participantes.php");
    exit();
}

$id = $_GET['id'];

require_once 'ParticipanteController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', ''); // Conexión a la base de datos
$controller = new ParticipanteController($db);

// Obtener los datos del participante por su ID
$participante = $controller->getParticipanteById($id);

// Verificar si el participante existe
if ($participante) {
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Detalles del Participante</title>";
    echo "<!-- Bootstrap CSS -->";
    echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>";
    echo "<style>";
    echo ".table { background-color: white; }";
    echo ".container { margin-top: 200px; }";
    echo ".form-label { color: white; }";
    echo "h1 { color: white; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    include 'navegador.php';
    echo "<div class='container'>";
    echo "<h1 class='mt-4 mb-4'>Detalles del Participante</h1>";
    echo "<div class='row'>";
    echo "<div class='col-md-6 offset-md-3'>";
    echo "<table class='table table-bordered'>";
    echo "<tr><th>ID</th><td>" . $participante['id'] . "</td></tr>";
    echo "<tr><th>Nombre</th><td>" . $participante['nombre'] . "</td></tr>";
    echo "<tr><th>Apellido</th><td>" . $participante['apellido'] . "</td></tr>";
    echo "<tr><th>DNI</th><td>" . $participante['dni'] . "</td></tr>";
    echo "<tr><th>Participante Género ID</th><td>" . $participante['participante_genero_id'] . "</td></tr>";
    echo "<tr><th>Grado Estudio ID</th><td>" . $participante['grado_estudio_id'] . "</td></tr>";
    echo "<tr><th>Año Estudio</th><td>" . $participante['año_estudio'] . "</td></tr>";
    echo "<tr><th>Especialidad</th><td>" . $participante['especialidad'] . "</td></tr>";
    echo "<tr><th>Correo</th><td>" . $participante['correo'] . "</td></tr>";
    echo "<tr><th>Clave</th><td>" . $participante['clave'] . "</td></tr>";
    echo "<tr><th>Robot ID</th><td>" . $participante['robot_id'] . "</td></tr>";
    echo "<tr><th>Club Robótica ID</th><td>" . $participante['club_robotica_id'] . "</td></tr>";
    echo "<tr><th>Fecha Nacimiento</th><td>" . $participante['fecha_nacimiento'] . "</td></tr>";
    echo "</table>";
    echo "<a href='ParticipanteView.php' class='btn btn-primary'>Regresar</a>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
} else {
    echo "<h1>No se encontró el participante.</h1>";
}
?>

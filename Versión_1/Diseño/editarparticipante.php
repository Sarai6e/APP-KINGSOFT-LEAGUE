<?php
require_once 'ParticipanteController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new ParticipanteController($db);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $participante = $controller->getParticipanteById($id);
}

if(!$participante) {
    die('Participante no encontrado.');
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $genero = $_POST['genero'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $correo = $_POST['correo'];
    $anio_estudio = $_POST['anio_estudio'];
    $especialidad = $_POST['especialidad'];
    $grado_estudio = $_POST['grado_estudio'];
    $id_club_robotica = $_POST['id_club_robotica'];
    $nombre_institucion_id = $_POST['nombre_institucion_id'];

    if($controller->updateParticipante($id, $nombre, $apellidos, $dni, $genero, $fecha_nacimiento, $correo, $anio_estudio, $especialidad, $grado_estudio, $id_club_robotica, $nombre_institucion_id)) {
        header('Location: ParticipanteView.php');
    } else {
        echo 'Error al actualizar el participante.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Participante</title>
</head>
<body>
    <h1>Editar Participante</h1>
    <form action="" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $participante['nombre']; ?>"><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" value="<?php echo $participante['apellidos']; ?>"><br>

        <label for="dni">DNI:</label>
        <input type="text" name="dni" value="<?php echo $participante['dni']; ?>"><br>

        <!-- Aquí se incluyen los demás campos del participante -->

        <input type="submit" value="Actualizar">
    </form>
</body>
</html>

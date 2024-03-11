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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Participante</title>
</head>
<body>
    <h1>Detalles del Participante</h1>
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

    <a href="ParticipanteView.php">Volver</a>
</body>
</html>

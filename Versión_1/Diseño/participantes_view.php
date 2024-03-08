<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Participantes</title>
</head>
<body>
    <h1>Listado de Participantes</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>DNI</th>
            <th>Correo</th>
        </tr>
        <?php foreach ($participantes as $participante): ?>
        <tr>
            <td><?php echo $participante['id']; ?></td>
            <td><?php echo $participante['nombre']; ?></td>
            <td><?php echo $participante['apellidos']; ?></td>
            <td><?php echo $participante['dni']; ?></td>
            <td><?php echo $participante['correo']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php

require_once 'ParticipanteModel.php';
require_once 'ParticipanteController.php';

// Configurar la conexión a la base de datos (PDO)
$pdo = new PDO('mysql:host=nombre_servidor;dbname=nombre_base_datos', 'usuario', 'contraseña');

// Crear instancia del modelo
$model = new ParticipanteModel($pdo);

// Crear instancia del controlador
$controller = new ParticipanteController($model);

// Llamar a la acción del controlador para listar participantes
$controller->listarParticipantes();

?>

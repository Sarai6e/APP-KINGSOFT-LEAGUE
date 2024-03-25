<?php
require_once 'ParticipanteGeneroController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new ParticipanteGeneroController($db);

// Ver todos los géneros de participantes
$participante_genero = $controller->getAllParticipanteGenero();

// Código HTML para mostrar los géneros de participantes y opciones para ver, editar y eliminar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Géneros de Participantes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table{
            background-color:white;
        }
        .container {
            margin-top: 150px; /* Ajuste del margen superior */
            text-align: center; /* Centrar elementos dentro del contenedor */
        }
        h1{
             color:white;
        }
    </style>
</head>
<body>
<?php 
    include 'navegador.php'
    ?>
<div class="container">
        <!-- Título y botón de agregar -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mt-4 mb-4">Participante_genero</h1>
            <a href="agregar_club.php" class="btn btn-success">Agregar Participantes</a>
        </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Género</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($genero = $participante_genero->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?php echo $genero['id']; ?></td>
                        <td><?php echo $genero['genero']; ?></td>
                        <td>
                            <a href="vergenero.php?id=<?php echo $genero['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="editargenero.php?id=<?php echo $genero['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminargenero.php?id=<?php echo $genero['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

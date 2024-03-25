<?php
require_once 'GradoEstudioController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new GradoEstudioController($db);

// Ver todos los grados de estudio
$grados_estudio = $controller->getAllGradosEstudio();

// Código HTML para mostrar los grados de estudio y opciones para ver, editar y eliminar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grados de Estudio</title>
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
            <h1 class="mt-4 mb-4">Grado de Estudio</h1>
            <a href="agregar_club.php" class="btn btn-success">Agregar Grado de Estudio</a>
        </div>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Grado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($grado = $grados_estudio->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?php echo $grado['id']; ?></td>
                        <td><?php echo $grado['grado']; ?></td>
                        <td>
                            <a href="vergrado.php?id=<?php echo $grado['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="editargrado.php?id=<?php echo $grado['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminargrado.php?id=<?php echo $grado['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
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

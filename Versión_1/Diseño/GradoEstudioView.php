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
</head>
<body>
    <div class="container">
        <h1>Grados de Estudio</h1>
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
        <a href="menulogin.html" class="btn btn-secondary">Volver</a>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

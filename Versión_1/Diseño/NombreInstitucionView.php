<?php
require_once 'NombreInstitucionController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new NombreInstitucionController($db);

// Ver todos los nombres de institución
$nombres_institucion = $controller->getAllNombresInstitucion();

// Código HTML para mostrar los nombres de institución y opciones para ver, editar y eliminar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombres de Institución</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Nombres de Institución</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($nombre_institucion = $nombres_institucion->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?php echo $nombre_institucion['id']; ?></td>
                        <td><?php echo $nombre_institucion['nombre']; ?></td>
                        <td>
                            <a href="vernombre.php?id=<?php echo $nombre_institucion['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="editarnombre.php?id=<?php echo $nombre_institucion['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminarnombre.php?id=<?php echo $nombre_institucion['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
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

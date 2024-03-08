<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robots</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Robots</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Peso</th>
                    <th>Ancho</th>
                    <th>Alto</th>
                    <th>ID Participante</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(isset($robots)) {
                    foreach ($robots as $robot): ?>
                        <tr>
                            <td><?php echo $robot['id']; ?></td>
                            <td><?php echo $robot['nombre']; ?></td>
                            <td><?php echo $robot['peso']; ?></td>
                            <td><?php echo $robot['ancho']; ?></td>
                            <td><?php echo $robot['alto']; ?></td>
                            <td><?php echo $robot['id_participante']; ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $robot['id']; ?>" class="btn btn-primary btn-sm mr-2">Editar</a>
                                <a href="eliminar.php?id=<?php echo $robot['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach;
                } else {
                    echo "<tr><td colspan='7'>No hay robots registrados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Enlace a Bootstrap JS y jQuery (opcional, si necesitas componentes interactivos) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robots en Competencia</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Robots en Competencia</h1>
        <h2>Competencia ID: <?php echo $competencia_id; ?></h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>ID Robot</th>
                    <th>ID Competencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(isset($robots_competencia)) {
                    foreach ($robots_competencia as $robot_competencia): ?>
                        <tr>
                            <td><?php echo $robot_competencia['id']; ?></td>
                            <td><?php echo $robot_competencia['id_robot']; ?></td>
                            <td><?php echo $robot_competencia['id_competencia']; ?></td>
                            <td>
                                <a href="eliminar.php?id=<?php echo $robot_competencia['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach;
                } else {
                    echo "<tr><td colspan='4'>No hay robots asignados a esta competencia.</td></tr>";
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

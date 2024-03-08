<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club de Robótica</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Club de Robótica</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th>País</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(isset($clubs)) {
                    foreach ($clubs as $club): ?>
                        <tr>
                            <td><?php echo $club['id']; ?></td>
                            <td><?php echo $club['nombre']; ?></td>
                            <td><?php echo $club['ciudad']; ?></td>
                            <td><?php echo $club['pais']; ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $club['id']; ?>" class="btn btn-primary btn-sm mr-2">Editar</a>
                                <a href="eliminar.php?id=<?php echo $club['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach;
                } else {
                    echo "<tr><td colspan='5'>No hay clubes de robótica registrados.</td></tr>";
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

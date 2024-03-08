<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Participantes</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Género</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Correo</th>
                    <th>Año de Estudio</th>
                    <th>Especialidad</th>
                    <th>Grado de Estudio</th>
                    <th>Club de Robótica</th>
                    <th>Institución</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(isset($participantes)) {
                    foreach ($participantes as $participante): ?>
                        <tr>
                            <td><?php echo $participante['id']; ?></td>
                            <td><?php echo $participante['nombre']; ?></td>
                            <td><?php echo $participante['apellidos']; ?></td>
                            <td><?php echo $participante['dni']; ?></td>
                            <td><?php echo $participante['genero']; ?></td>
                            <td><?php echo $participante['fecha_nacimiento']; ?></td>
                            <td><?php echo $participante['correo']; ?></td>
                            <td><?php echo $participante['anio_estudio']; ?></td>
                            <td><?php echo $participante['especialidad']; ?></td>
                            <td><?php echo $participante['grado_estudio']; ?></td>
                            <td><?php echo $participante['id_club_robotica']; ?></td>
                            <td><?php echo $participante['nombre_institucion_id']; ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $participante['id']; ?>" class="btn btn-primary btn-sm mr-2">Editar</a>
                                <a href="eliminar.php?id=<?php echo $participante['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach;
                } else {
                    echo "<tr><td colspan='13'>No hay participantes registrados.</td></tr>";
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

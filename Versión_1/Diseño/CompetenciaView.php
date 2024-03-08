<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competencias</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Competencias</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha Inicio Inscripción</th>
                    <th>Fecha Fin Inscripción</th>
                    <th>Fecha Competencia</th>
                    <th>Tipo Competencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(isset($competencias)) {
                    foreach ($competencias as $competencia): ?>
                        <tr>
                            <td><?php echo $competencia['id']; ?></td>
                            <td><?php echo $competencia['nombre']; ?></td>
                            <td><?php echo $competencia['fecha_inicio_inscripcion']; ?></td>
                            <td><?php echo $competencia['fecha_fin_inscripcion']; ?></td>
                            <td><?php echo $competencia['fecha_compentencia']; ?></td>
                            <td><?php echo $competencia['tipo_competencia']; ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $competencia['id']; ?>" class="btn btn-primary btn-sm mr-2">Editar</a>
                                <a href="eliminar.php?id=<?php echo $competencia['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach;
                } else {
                    echo "<tr><td colspan='7'>No hay competencias registradas.</td></tr>";
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

<?php
require_once 'CompetenciaController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new CompetenciaController($db);

// Ver todas las competencias
$competencias = $controller->getAllCompetencias();

// Código HTML para mostrar las competencias y opciones para ver, editar y eliminar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competencias</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Competencias</h1>
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
                <?php while ($competencia = $competencias->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?php echo $competencia['id']; ?></td>
                        <td><?php echo $competencia['nombre']; ?></td>
                        <td><?php echo $competencia['fecha_inicio_inscripcion']; ?></td>
                        <td><?php echo $competencia['fecha_fin_inscripcion']; ?></td>
                        <td><?php echo $competencia['fecha_compentencia']; ?></td>
                        <td><?php echo $competencia['tipo_competencia']; ?></td>
                        <td>
                            <a href="vercompetencia.php?id=<?php echo $competencia['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="editarcompetencia.php?id=<?php echo $competencia['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminarcompetencia.php?id=<?php echo $competencia['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
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

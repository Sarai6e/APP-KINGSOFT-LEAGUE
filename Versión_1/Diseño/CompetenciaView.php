<?php 
include("./app/config.php");
include("./layout/sesion.php");
?>
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
<?php include 'navegador.php'; ?>
<div class="container">
        <!-- Título y botón de agregar -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mt-4 mb-4">Competencia</h1>
            <a href="agregar_competencia.php" class="btn btn-success">Agregar Competencia</a>
        </div>

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
                        <td><?php echo obtenerNombreTipoCompetencia($competencia['tipo_competencia'], $db); ?></td>
                        <td>
                            <a href="vercompetencia.php?id=<?php echo $competencia['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="editarcompetencia.php?id=<?php echo $competencia['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminarcompetencia.php?id=<?php echo $competencia['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
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

<?php
// Función para obtener el nombre del tipo de competencia
function obtenerNombreTipoCompetencia($tipo_competencia_id, $db) {
    $query = "SELECT nombre FROM tipo_competencia WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $tipo_competencia_id);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return $resultado['nombre'];
}
?>
</body>
</html>

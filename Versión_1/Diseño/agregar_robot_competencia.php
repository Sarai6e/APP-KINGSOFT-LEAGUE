<?php 
include("./app/config.php");
include("./layout/sesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Robot Competencia</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 150px;
            text-align: center;
        }
        h2 {
            color: white;
        }
        label {
            color: white;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
<?php include 'navegador.php'; ?>
<div class="container">
    <h2>Agregar Robot Competencia</h2>
    <form action="procesar_agregar_robot_competencia.php" method="POST">
    <div class="form-group">
        <label for="id_robot">ID del Robot:</label>
        <input type="text" class="form-control" id="id_robot" name="id_robot" required>
    </div>
    <div class="form-group">
        <label for="id_competencia">ID de la Competencia:</label>
        <input type="text" class="form-control" id="id_competencia" name="id_competencia" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Agregar</button>
        <a href="RobotCompetenciaView.php" class="btn btn-danger">Cancelar</a>
    </div>
</form>
</div>
<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

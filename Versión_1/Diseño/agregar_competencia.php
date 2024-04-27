<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Competencia</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
            text-align: center;
        }
        label {
            color: white;
            font-weight: bold;
        }
        h2 {
            color: white;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        select.form-control {
            color: #495057;
            background-color: #fff;
            border-color: #ced4da;
        }
        select.form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>
</head>
<body>
<?php include 'navegador.php'; ?>
<div class="container">
    <h2 class="mb-4">Agregar Competencia</h2>
    <form action="procesar_agregar_competencia.php" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="fecha_inicio_inscripcion">Fecha Inicio Inscripción:</label>
            <input type="date" class="form-control" id="fecha_inicio_inscripcion" name="fecha_inicio_inscripcion" required>
        </div>
        <div class="form-group">
            <label for="fecha_fin_inscripcion">Fecha Fin Inscripción:</label>
            <input type="date" class="form-control" id="fecha_fin_inscripcion" name="fecha_fin_inscripcion" required>
        </div>
        <div class="form-group">
            <label for="fecha_competencia">Fecha Competencia:</label>
            <input type="date" class="form-control" id="fecha_competencia" name="fecha_competencia" required>
        </div>
        <div class="form-group">
            <label for="tipo_competencia">Tipo Competencia:</label>
            <select class="form-control" id="tipo_competencia" name="tipo_competencia" required>
                <option value="">Seleccionar tipo de competencia</option>
                <?php
                // Obtener tipos de competencia desde la base de datos
                $tipos_competencia_query = "SELECT id, nombre FROM tipo_competencia";
                $tipos_competencia_stmt = $db->query($tipos_competencia_query);
                while ($tipo_competencia = $tipos_competencia_stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='".$tipo_competencia['id']."'>".$tipo_competencia['nombre']."</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Agregar Competencia</button>
            <a href="javascript:history.go(-1)" class="btn btn-secondary btn-lg">Cancelar</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

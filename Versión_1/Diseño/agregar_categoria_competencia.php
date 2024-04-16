<?php
include("./app/config.php");
include("./layout/sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Categoría de Competencia</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            margin-top: 150px;
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
    <h2>Agregar Categoría de Competencia</h2>
    <form action="procesar_categoria_competencia.php" method="POST">
        <div class="form-group">
            <label for="id_tipo_competencia">ID Tipo de Competencia:</label>
            <input type="text" class="form-control" id="id_tipo_competencia" name="id_tipo_competencia" required>
        </div>
        <div class="form-group">
            <label for="id_categoria_jugador">ID Categoría de Jugador:</label>
            <input type="text" class="form-control" id="id_categoria_jugador" name="id_categoria_jugador" required>
        </div>
        <div class="form-group">
            <label for="reglas">Reglas:</label>
            <input type="text" class="form-control" id="reglas" name="reglas">
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" class="form-control" id="precio" name="precio">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="categoria_competencia_view.php" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
    <?php
    // Mostrar mensajes de éxito o error después de procesar el formulario
    if (isset($_GET['success'])) {
        echo '<div class="alert alert-success" role="alert">Categoría de competencia agregada correctamente.</div>';
    } elseif (isset($_GET['error'])) {
        echo '<div class="alert alert-danger" role="alert">Error al agregar la categoría de competencia. Por favor, inténtalo de nuevo.</div>';
    }
    ?>
</div>
<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

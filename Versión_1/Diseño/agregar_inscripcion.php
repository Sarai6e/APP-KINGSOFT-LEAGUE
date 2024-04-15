<?php
include("./app/config.php");
include("./layout/sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Inscripción</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       .table{
            background-color:white;
        }
        .container {
            margin-top: 200px; /* Ajuste del margen superior */
        }
        label{
            color:white;
        }
        h2{
             color:white;
        }
    </style>
</head>
<body>
<?php include 'navegador.php'; ?>
<div class="container">
    <h2>Agregar Inscripción</h2>
    <form action="procesar_inscripcion.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id_usuario">ID de Usuario:</label>
            <input type="text" class="form-control" id="id_usuario" name="id_usuario">
        </div>
        <div class="form-group">
            <label for="id_categoria">ID Categoría de Competencia:</label>
            <input type="text" class="form-control" id="id_categoria" name="id_categoria">
        </div>
        <!-- Agrega más campos aquí según tu estructura de base de datos -->
        <div class="form-group">
            <label for="boucher">Boucher:</label>
            <input type="file" class="form-control-file" id="boucher" name="boucher">
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

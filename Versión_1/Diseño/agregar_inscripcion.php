<?php include("./app/config.php"); ?>
<?php include("./layout/sesion.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Inscripción</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    <style>
        .container {
            margin-top: 150px;
    
        }
        label {
            font-weight: bold;
        }
        h2 {
            margin-bottom: 30px;
        }
        .btn-primary,
        .btn-danger {
            width: 100px;
        }
        
    </style>
</head>
<body>
    <?php include 'navegador.php'; ?>
    <div class="container">
        <h2>Agregar Inscripción</h2>
        <form action="procesar_inscripcion.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id_participante">ID de Participante:</label>
                <input type="text" class="form-control" id="id_participante" name="id_participante" required>
            </div>
            <div class="form-group">
                <label for="id_categoria">ID Categoría de Competencia:</label>
                <input type="text" class="form-control" id="id_categoria" name="id_categoria" required>
            </div>
            <div class="form-group">
                <label for="id_robot">ID del Robot:</label>
                <input type="text" class="form-control" id="id_robot" name="id_robot" required>
            </div>
            <div class="form-group">
                <label for="boucher">Boucher (Archivo PDF):</label>
                <input type="file" class="form-control-file" id="boucher" name="boucher" required>
            </div>
            <div class="form-group">
                <label for="confirmacion">Confirmación:</label>
                <select class="form-control" id="confirmacion" name="confirmacion" required>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="puntaje">Puntaje:</label>
                <input type="text" class="form-control" id="puntaje" name="puntaje">
            </div>
            <div class="form-group">
                <label for="posicion">Posición:</label>
                <input type="text" class="form-control" id="posicion" name="posicion">
            </div>
            <div class="form-group">
                <label for="descalificacion">Desclasificación:</label>
                <select class="form-control" id="descalificacion" name="descalificacion">
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Agregar</button>
                <a href="inscripcion_view.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
        <?php
        // Mostrar mensajes de éxito o error después de procesar el formulario
        if (isset($_GET['success'])) {
            echo '<div class="alert alert-success" role="alert">Inscripción registrada correctamente.</div>';
        } elseif (isset($_GET['error'])) {
            echo '<div class="alert alert-danger" role="alert">Error al registrar la inscripción. Por favor, inténtalo de nuevo.</div>';
        }
        ?>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

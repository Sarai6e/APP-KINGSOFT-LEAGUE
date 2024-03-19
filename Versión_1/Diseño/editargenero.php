<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Género del Participante</title>
    <!-- Agregar Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
<?php 
    include 'navegador.php'
    ?>
    <div class="container">
        <?php
        require_once 'ParticipanteGeneroController.php';

        // Verificar si se envió el formulario de edición
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
            $controller = new ParticipanteGeneroController($db);

            // Verificar si se proporcionó un ID válido
            if (isset($_POST["id"]) && !empty(trim($_POST["id"]))) {
                $id = trim($_POST["id"]);
                $genero = trim($_POST["genero"]);

                // Actualizar el género del participante
                if ($controller->updateParticipanteGenero($id, $genero)) {
                    header("location: ParticipanteGeneroView.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Hubo un problema al actualizar el género del participante.</div>";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>ID de género del participante no especificado.</div>";
            }
        } else {
            // Mostrar el formulario de edición con los datos actuales
            if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
                $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
                $controller = new ParticipanteGeneroController($db);

                $id = trim($_GET["id"]);

                // Obtener el género del participante por ID
                $genero = $controller->getParticipanteGeneroById($id);

                if ($genero) {
        ?>
                    <h2>Editar Género del Participante</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $genero['id']; ?>">
                        <div class="mb-3">
                            <label for="genero">Género:</label>
                            <input type="text" class="form-control" name="genero" value="<?php echo $genero['genero']; ?>">
                        </div>
                        <div>
                            <input type="submit" value="Guardar" class="btn btn-primary">
                            <a href="ParticipanteGeneroView.php" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
        <?php
                } else {
                    echo "<div class='alert alert-warning' role='alert'>No se encontró el género del participante.</div>";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>ID de género del participante no especificado.</div>";
            }
        }
        ?>
    </div>

    <!-- Agregar Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

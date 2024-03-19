<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Participante</title>
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
        h1{
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
        require_once 'ParticipanteController.php';

        // Verificar si se envió el formulario de edición
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
            $controller = new ParticipanteController($db);

            // Verificar si se proporcionó un ID válido
            if (isset($_POST["id"]) && !empty(trim($_POST["id"]))) {
                $id = trim($_POST["id"]);
                $nombre = trim($_POST["nombre"]);
                $apellido = trim($_POST["apellido"]);
                $dni = trim($_POST["dni"]);
                $genero_id = trim($_POST["genero_id"]);
                $grado_estudio_id = trim($_POST["grado_estudio_id"]);
                $año_estudio = trim($_POST["año_estudio"]);
                $especialidad = trim($_POST["especialidad"]);
                $correo = trim($_POST["correo"]);
                $clave = trim($_POST["clave"]);
                $robot_id = trim($_POST["robot_id"]);
                $club_robotica_id = trim($_POST["club_robotica_id"]);
                $fecha_nacimiento = trim($_POST["fecha_nacimiento"]);

                // Actualizar el participante
                if ($controller->updateParticipante($id, $nombre, $apellido, $dni, $genero_id, $grado_estudio_id, $año_estudio, $especialidad, $correo, $clave, $robot_id, $club_robotica_id, $fecha_nacimiento)) {
                    header("location: ParticipanteView.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Hubo un problema al actualizar el participante.</div>";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>ID de participante no especificado.</div>";
            }
        } else {
            // Mostrar el formulario de edición con los datos actuales
            if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
                $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
                $controller = new ParticipanteController($db);

                $id = trim($_GET["id"]);

                // Obtener el participante por ID
                $participante = $controller->getParticipanteById($id);

                if ($participante) {
        ?>
                    <h1>Editar Participante</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $participante['id']; ?>">
                        
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $participante['nombre']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" name="apellido" value="<?php echo $participante['apellido']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI:</label>
                            <input type="text" class="form-control" name="dni" value="<?php echo $participante['dni']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="genero_id" class="form-label">Participante Género ID:</label>
                            <input type="text" class="form-control" name="genero_id" value="<?php echo $participante['participante_genero_id']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="grado_estudio_id" class="form-label">Grado Estudio ID:</label>
                            <input type="text" class="form-control" name="grado_estudio_id" value="<?php echo $participante['grado_estudio_id']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="año_estudio" class="form-label">Año Estudio:</label>
                            <input type="text" class="form-control" name="año_estudio" value="<?php echo $participante['año_estudio']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="especialidad" class="form-label">Especialidad:</label>
                            <input type="text" class="form-control" name="especialidad" value="<?php echo $participante['especialidad']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo:</label>
                            <input type="text" class="form-control" name="correo" value="<?php echo $participante['correo']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="clave" class="form-label">Clave:</label>
                            <input type="password" class="form-control" name="clave" value="<?php echo $participante['clave']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="robot_id" class="form-label">Robot ID:</label>
                            <input type="text" class="form-control" name="robot_id" value="<?php echo $participante['robot_id']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="club_robotica_id" class="form-label">Club Robótica ID:</label>
                            <input type="text" class="form-control" name="club_robotica_id" value="<?php echo $participante['club_robotica_id']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento:</label>
                            <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $participante['fecha_nacimiento']; ?>">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class= "btn btn-success" value="Guardar Cambios">
                            <a href="ParticipanteView.php" class="btn btn-secondary">Regresar</a>
                        </div>
                    </form>
        <?php
                } else {
                    echo "<div class='alert alert-warning' role='alert'>No se encontró el participante.</div>";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>ID de participante no especificado.</div>";
            }
        }
        ?>
    </div>

    <!-- Agregar Bootstrap JS (Opcional, si lo necesitas) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

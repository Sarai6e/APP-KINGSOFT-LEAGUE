<?php 
include("./app/config.php");
include("./layout/sesion.php");

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se han proporcionado los datos necesarios
    if (isset($_POST['genero']) && !empty($_POST['genero'])) {
        // Recoge los datos del formulario
        $genero = $_POST['genero'];

        // Conexión a la base de datos
        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');

        // Prepara la consulta para insertar el género de participante en la base de datos
        $query = "INSERT INTO participante_genero (genero) VALUES (?)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $genero);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            // Redirecciona con mensaje de éxito
            header("Location: ParticipanteGeneroView.php?success=true");
            exit();
        } else {
            // Redirecciona con mensaje de error
            header("Location: agregar_genero_participante.php?error=true");
            exit();
        }
    } else {
        // Redirecciona con mensaje de error si faltan campos
        header("Location: agregar_genero_participante.php?error=true");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Género de Participante</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php include 'navegador.php'; ?>
<div class="container">
    <h1 class="mt-4 mb-4">Agregar Género de Participante</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <!-- Formulario de agregar género de participante -->
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="genero">Género:</label>
                    <input type="text" class="form-control" id="genero" name="genero" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button>
                <a href="ParticipanteGeneroView.php">Volver</a>
            </form>
        </div>
    </div>
    <?php
    // Mostrar mensajes de éxito o error después de procesar el formulario
    if (isset($_GET['success'])) {
        echo '<div class="alert alert-success" role="alert">Genero agregada correctamente.</div>';
    } elseif (isset($_GET['error'])) {
        echo '<div class="alert alert-danger" role="alert">Error al agregar el genero. Por favor, inténtalo de nuevo.</div>';
    }
    ?>
</div>
</body>
</html>

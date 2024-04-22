<?php
require_once 'Inscripcion_Controller.php';

// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificamos si se han subido archivos
    if (isset($_FILES["boucher"]) && $_FILES["boucher"]["error"] == 0) {
        // Definimos la ubicación para guardar el archivo
        $target_dir = "uploads/";
        // Obtenemos el ID del participante
        $id_participante = $_POST["id_participante"];
        // Obtenemos el nombre del archivo subido
        $file_name = basename($_FILES["boucher"]["name"]);
        // Generamos un nombre único para evitar conflictos de nombres
        $file_name = $id_participante . "_" . $file_name;
        // Definimos la ubicación completa del archivo
        $target_file = $target_dir . $file_name;

        // Movemos el archivo a la ubicación deseada
        if (move_uploaded_file($_FILES["boucher"]["tmp_name"], $target_file)) {
            // Si el archivo se ha movido correctamente, actualizamos la base de datos
            $db_host = 'localhost';
            $db_name = 'datosks';
            $db_user = 'usuario';
            $db_pass = 'contraseña';

            try {
                $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $inscripcionController = new InscripcionController($db);
                // Obtenemos los demás datos del formulario
                $id_categoria = $_POST["id_categoria"];
                $id_robot = $_POST["id_robot"];
                $confirmacion = $_POST["confirmacion"];
                $puntaje = isset($_POST["puntaje"]) ? $_POST["puntaje"] : null;
                $posicion = isset($_POST["posicion"]) ? $_POST["posicion"] : null;
                $descalificacion = $_POST["descalificacion"];
                // Llamamos al método para agregar la inscripción
                $result = $inscripcionController->agregarInscripcion($id_participante, $id_categoria, $id_robot, $file_name, $confirmacion, $puntaje, $posicion, $descalificacion);
                // Verificamos si la inserción fue exitosa
                if ($result) {
                    // Redireccionamos a la página de éxito
                    header("Location: agregar_inscripcion.php?success");
                    exit();
                } else {
                    // Si hubo un error en la inserción, redireccionamos a la página de error
                    header("Location: agregar_inscripcion.php?error");
                    exit();
                }
            } catch(PDOException $e) {
                // Si ocurre un error en la conexión PDO, mostramos el mensaje de error
                echo "Error de conexión: " . $e->getMessage();
                exit();
            }
        } else {
            // Si ocurrió un error al mover el archivo, redireccionamos a la página de error
            header("Location: agregar_inscripcion.php?error");
            exit();
        }
    }
}
?>

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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
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

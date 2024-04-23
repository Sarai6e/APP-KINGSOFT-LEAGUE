<?php
require_once 'Inscripcion_Controller.php';

// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificamos si se han subido archivos
    if (isset($_FILES["boucher"]) && $_FILES["boucher"]["error"] == 0) {
        // Definimos la ubicación para guardar el archivo
        $target_dir = "BOUCHER/";
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
            $db_user = 'root';
            $db_pass = '';

            try {
                $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $inscripcionController = new InscripcionController($pdo);
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
            color: white;
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
                <input type="text" class="form-control" id="id_participante" name="id_participante" value="<?php echo $_SESSION['id_participante']; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="id_categoria">ID Categoría de Competencia:</label>
                <!-- Combo para seleccionar la categoría de la base de datos -->
                <select class="form-control" id="id_categoria" name="id_categoria" required>
                    <?php
                    // Realizamos la consulta SQL para obtener las categorías de competencia
                    $stmt = $pdo->prepare("SELECT id_competencia, id_categoria_jugador FROM categoria_competencia");
                    $stmt->execute();
                    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach ($categorias as $categoria) {
                        // Obtenemos el ID de la categoría y buscamos su descripción en la tabla 'categoria'
                        $stmt = $pdo->prepare("SELECT descripcion FROM categoria WHERE id = ?");
                        $stmt->execute([$categoria['id_categoria_jugador']]);
                        $descripcion = $stmt->fetchColumn();

                        // Mostramos la descripción como opción en el select
                        echo '<option value="' . $categoria['id_competencia'] . '">' . $descripcion . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_robot">ID del Robot:</label>
                <!-- Combo para seleccionar el robot de la base de datos -->
                <select class="form-control" id="id_robot" name="id_robot" required>
                    <?php
                    // Realizamos la consulta SQL para obtener los robots
                    $stmt = $pdo->prepare("SELECT id, nombre FROM robot");
                    $stmt->execute();
                    $robots = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach ($robots as $robot) {
                        // Mostramos el nombre del robot como opción en el select
                        echo '<option value="' . $robot['id'] . '">' . $robot['nombre'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="boucher">Boucher:</label>
                <input type="file" class="form-control-file" id="boucher" name="boucher" accept=".jpeg, .jpg, .png, .pdf" required>
            </div>
            <div class="form-group">
                <label for="confirmacion">Confirmación:</label>
                <select class="form-control" id="confirmacion" name="confirmacion" required>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="puntaje">Puntaje:</label>
                <input type="number" class="form-control" id="puntaje" name="puntaje" min="0" max="100">
            </div>
            <div class="form-group">
                <label for="posicion">Posición:</label>
                <input type="number" class="form-control" id="posicion" name="posicion" min="1">
            </div>
            <div class="form-group">
                <label for="descalificacion">Desclasificación:</label>
                <select class="form-control" id="descalificacion" name="descalificacion" required>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            <button type="inscripcion_view.php" class="btn btn-primary">Agregar</button>
            <a href="inscripcion_view.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</body>
</html>

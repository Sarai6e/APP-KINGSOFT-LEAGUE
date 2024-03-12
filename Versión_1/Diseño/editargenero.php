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
            echo "Hubo un problema al actualizar el género del participante.";
        }
    } else {
        echo "ID de género del participante no especificado.";
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
                <div>
                    <label for="genero">Género:</label>
                    <input type="text" name="genero" value="<?php echo $genero['genero']; ?>">
                </div>
                <div>
                    <input type="submit" value="Guardar">
                    <a href="ParticipanteGeneroView.php">Cancelar</a>
                </div>
            </form>
<?php
        } else {
            echo "No se encontró el género del participante.";
        }
    } else {
        echo "ID de género del participante no especificado.";
    }
}
?>

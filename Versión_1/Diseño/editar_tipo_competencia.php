<?php
require_once 'TipoCompetenciaController.php';

// Verificar si se ha proporcionado un ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
        $controller = new TipoCompetenciaController($db);

        // Actualizar el tipo de competencia
        if ($controller->updateTipoCompetencia($id, $nombre, $descripcion)) {
            echo "Tipo de competencia actualizado correctamente.";
        } else {
            echo "Error al actualizar el tipo de competencia.";
        }
    }

    // Obtener la información del tipo de competencia
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new TipoCompetenciaController($db);
    $tipoCompetencia = $controller->getTipoCompetenciaById($id);

    if ($tipoCompetencia) {
        // Mostrar el formulario de edición
        ?>
        <h2>Editar Tipo de Competencia</h2>
        <form method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $tipoCompetencia['nombre']; ?>"><br>
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" value="<?php echo $tipoCompetencia['descripcion']; ?>"><br>
            <input type="submit" value="Guardar">
        </form>
        <?php
    } else {
        echo "Tipo de competencia no encontrado.";
    }
} else {
    echo "ID de tipo de competencia no proporcionado.";
}
?>

<?php
require_once 'RobotCompetenciaController.php';

// Verificar si se envió el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new RobotCompetenciaController($db);

    // Verificar si se proporcionó un ID válido
    if (isset($_POST["id"]) && !empty(trim($_POST["id"]))) {
        $id = trim($_POST["id"]);
        $id_robot = trim($_POST["id_robot"]);
        $id_competencia = trim($_POST["id_competencia"]);

        // Actualizar la competencia del robot
        if ($controller->updateRobotCompetencia($id, $id_robot, $id_competencia)) {
            header("location: RobotCompetenciaView.php");
            exit();
        } else {
            echo "Hubo un problema al actualizar la competencia del robot.";
        }
    } else {
        echo "ID de competencia del robot no especificado.";
    }
} else {
    // Mostrar el formulario de edición con los datos actuales
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
        $controller = new RobotCompetenciaController($db);

        $id = trim($_GET["id"]);

        // Obtener la competencia del robot por ID
        $robotCompetencia = $controller->getRobotCompetenciaById($id);

        if ($robotCompetencia) {
?>
            <h2>Editar Competencia del Robot</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $robotCompetencia['id']; ?>">
                <div>
                    <label for="id_robot">ID Robot:</label>
                    <input type="text" name="id_robot" value="<?php echo $robotCompetencia['id_robot']; ?>">
                </div>
                <div>
                    <label for="id_competencia">ID Competencia:</label>
                    <input type="text" name="id_competencia" value="<?php echo $robotCompetencia['id_competencia']; ?>">
                </div>
                <div>
                    <input type="submit" value="Guardar Cambios">
                    <a href="RobotCompetenciaView.php">Cancelar</a>
                </div>
            </form>
<?php
        } else {
            echo "No se encontró la competencia del robot.";
        }
    } else {
        echo "ID de competencia del robot no especificado.";
    }
}
?>

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
            echo "Hubo un problema al actualizar el participante.";
        }
    } else {
        echo "ID de participante no especificado.";
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
            <h2>Editar Participante</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $participante['id']; ?>">
                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $participante['nombre']; ?>">
                </div>
                <div>
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" value="<?php echo $participante['apellido']; ?>">
                </div>
                <div>
                    <label for="dni">DNI:</label>
                    <input type="text" name="dni" value="<?php echo $participante['dni']; ?>">
                </div>
                <div>
                    <label for="genero_id">Participante Género ID:</label>
                    <input type="text" name="genero_id" value="<?php echo $participante['participante_genero_id']; ?>">
                </div>
                <div>
                    <label for="grado_estudio_id">Grado Estudio ID:</label>
                    <input type="text" name="grado_estudio_id" value="<?php echo $participante['grado_estudio_id']; ?>">
                </div>
                <div>
                    <label for="año_estudio">Año Estudio:</label>
                    <input type="text" name="año_estudio" value="<?php echo $participante['año_estudio']; ?>">
                </div>
                <div>
                    <label for="especialidad">Especialidad:</label>
                    <input type="text" name="especialidad" value="<?php echo $participante['especialidad']; ?>">
                </div>
                <div>
                    <label for="correo">Correo:</label>
                    <input type="text" name="correo" value="<?php echo $participante['correo']; ?>">
                </div>
                <div>
                    <label for="clave">Clave:</label>
                    <input type="password" name="clave" value="<?php echo $participante['clave']; ?>">
                </div>
                <div>
                    <label for="robot_id">Robot ID:</label>
                    <input type="text" name="robot_id" value="<?php echo $participante['robot_id']; ?>">
                </div>
                <div>
                    <label for="club_robotica_id">Club Robótica ID:</label>
                    <input type="text" name="club_robotica_id" value="<?php echo $participante['club_robotica_id']; ?>">
                </div>
                <div>
                    <label for="fecha_nacimiento">Fecha Nacimiento:</label>
                    <input type="date" name="fecha_nacimiento" value="<?php echo $participante['fecha_nacimiento']; ?>">
                </div>
                <div>
                    <input type="submit" value="Guardar Cambios">
                    <a href="ParticipanteView.php">Cancelar</a>
                </div>
            </form>
<?php
        } else {
            echo "No se encontró el participante.";
        }
    } else {
        echo "ID de participante no especificado.";
    }
}
?>

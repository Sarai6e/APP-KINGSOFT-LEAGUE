<?php
// Procesar el formulario de agregar robot a competencia

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado el formulario correctamente
    if (isset($_POST['id_robot']) && isset($_POST['id_competencia'])) {
        // Recoger datos del formulario
        $id_robot = $_POST['id_robot'];
        $id_competencia = $_POST['id_competencia'];

        // Conexión a la base de datos (reemplaza 'nombre_de_la_base_de_datos', 'nombre_de_usuario' y 'contraseña' con los valores reales)
        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');

        // Preparar la consulta para insertar el robot en la competencia en la base de datos
        $query = "INSERT INTO robot_competencia (id_robot, id_competencia) VALUES (?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $id_robot);
        $stmt->bindParam(2, $id_competencia);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redireccionar con mensaje de éxito
            header("Location: RobotCompetenciaView.php?success=true");
            exit();
        } else {
            // Redireccionar con mensaje de error
            header("Location: RobotCompetenciaView.php?error=true");
            exit();
        }
    } else {
        // Redireccionar con mensaje de error si faltan campos
        header("Location: RobotCompetenciaView.php?error=true");
        exit();
    }
} else {
    // Redireccionar si no se accede mediante POST
    header("Location: RobotCompetenciaView.php");
    exit();
}
?>

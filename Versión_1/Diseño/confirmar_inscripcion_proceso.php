<?php
include("./app/config.php");
include("./layout/sesion.php");

require_once 'Inscripcion_Controller.php';

// Verificar si se ha enviado un formulario de confirmación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_inscripcion']) && isset($_POST['confirmar'])) {
    $id_inscripcion = $_POST['id_inscripcion'];
    $decision = $_POST['confirmar'];

    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', ''); // Conexión a la base de datos
    $controller = new InscripcionController($db);

    // Actualizar la inscripción con la decisión del usuario
    if ($controller->confirmarInscripcion($id_inscripcion, $decision)) {
        // Mostrar notificación de éxito
        echo "<script>alert('La inscripción ha sido confirmada/rechazada con éxito.')</script>";
    } else {
        // Mostrar notificación de error
        echo "<script>alert('Error al confirmar/rechazar la inscripción.')</script>";
    }
} else {
    // Redireccionar si no se enviaron los datos correctamente
    header("Location: index.php");
    exit();
}
?>

<?php
include("./app/config.php");
include("./layout/sesion.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    require_once 'Inscripcion_Controller.php';

    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', ''); // Conexión a la base de datos
    $controller = new InscripcionController($db);

    if($controller->deleteInscripcion($id)) {
        header("location: inscripcion_view.php");
    } else {
        echo "Error al eliminar la inscripción.";
    }
} else {
    echo "ID de inscripción no especificado.";
    exit;
}
?>

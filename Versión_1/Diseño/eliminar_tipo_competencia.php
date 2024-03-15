<?php
require_once 'TipoCompetenciaController.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new TipoCompetenciaController(new TipoCompetenciaModel($db));

    $id = $_GET['id'];

    if($controller->deleteTipoCompetencia($id)) {
        echo "Tipo de competencia eliminado correctamente.";
    } else {
        echo "Error al eliminar el tipo de competencia.";
    }
} else {
    echo "ID de tipo de competencia no válido.";
}
?>

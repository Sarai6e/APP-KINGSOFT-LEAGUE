<?php
require_once 'TipoCompetenciaController.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new TipoCompetenciaController(new TipoCompetenciaModel($db));

    $id = $_GET['id'];
    $tipoCompetencia = $controller->getTipoCompetencia($id);

    if($tipoCompetencia) {
        echo "ID: " . $tipoCompetencia['id'] . "<br>";
        echo "Nombre: " . $tipoCompetencia['nombre'] . "<br>";
        echo "Descripción: " . $tipoCompetencia['descripcion'] . "<br>";
    } else {
        echo "Tipo de competencia no encontrado.";
    }
} else {
    echo "ID de tipo de competencia no proporcionado.";
}
?>

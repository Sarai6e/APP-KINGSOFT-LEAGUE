<?php
require_once 'TipoCompetenciaModel.php';

class TipoCompetenciaController {
    private $model;

    public function __construct($db) {
        $this->model = new TipoCompetenciaModel($db);
    }

    public function index() {
        $tipos_competencia = $this->model->getAllTiposCompetencia();
        include 'TipoCompetenciaView.php';
    }
}

// Uso de ejemplo
$db = new PDO('mysql:host=localhost;dbname=nombre_de_tu_base_de_datos', 'usuario', 'contraseña');
$controller = new TipoCompetenciaController($db);
$controller->index();
?>

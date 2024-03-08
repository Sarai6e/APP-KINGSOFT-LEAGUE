<?php
require_once 'CompetenciaModel.php';

class CompetenciaController {
    private $model;

    public function __construct($db) {
        $this->model = new CompetenciaModel($db);
    }

    public function index() {
        $competencias = $this->model->getAllCompetencias();
        include 'CompetenciaView.php';
    }

    public function eliminar($id) {
        $this->model->deleteCompetencia($id);
        header("Location: index.php");
    }

    public function editar($id) {
        // Implementa la lógica para editar una competencia
    }
}

// Uso de ejemplo
$db = new PDO('mysql:host=localhost;dbname=nombre_de_tu_base_de_datos', 'usuario', 'contraseña');
$controller = new CompetenciaController($db);

// Manejo de las solicitudes
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    switch ($accion) {
        case 'eliminar':
            $id = $_GET['id'];
            $controller->eliminar($id);
            break;
        case 'editar':
            $id = $_GET['id'];
            $controller->editar($id);
            break;
        default:
            $controller->index();
            break;
    }
} else {
    $controller->index();
}
?>

<?php
require_once 'GradoEstudioModel.php';

class GradoEstudioController {
    private $model;

    public function __construct($db) {
        $this->model = new GradoEstudioModel($db);
    }

    public function index() {
        $gradosEstudio = $this->model->getAllGradosEstudio();
        include 'GradoEstudioView.php';
    }

    public function eliminar($id) {
        $this->model->deleteGradoEstudio($id);
        header("Location: index.php");
    }

    public function editar($id) {
        // Implementa la lógica para editar un grado de estudio
    }
}

// Uso de ejemplo
$db = new PDO('mysql:host=localhost;dbname=nombre_de_tu_base_de_datos', 'usuario', 'contraseña');
$controller = new GradoEstudioController($db);

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

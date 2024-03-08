<?php
require_once 'NombreInstitucionModel.php';

class NombreInstitucionController {
    private $model;

    public function __construct($db) {
        $this->model = new NombreInstitucionModel($db);
    }

    public function index() {
        $instituciones = $this->model->getAllInstituciones();
        include 'NombreInstitucionView.php';
    }

    public function eliminar($id) {
        $this->model->deleteInstitucion($id);
        header("Location: index.php");
    }

    public function editar($id) {
        // Implementa la lógica para editar una institución
    }
}

// Uso de ejemplo
$db = new PDO('mysql:host=localhost;dbname=nombre_de_tu_base_de_datos', 'usuario', 'contraseña');
$controller = new NombreInstitucionController($db);

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

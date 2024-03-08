<?php
require_once 'RobotModel.php';

class RobotController {
    private $model;

    public function __construct($db) {
        $this->model = new RobotModel($db);
    }

    public function index() {
        $robots = $this->model->getAllRobots();
        include 'RobotView.php';
    }

    public function eliminar($id) {
        $this->model->deleteRobot($id);
        header("Location: index.php");
    }

    public function editar($id) {
        // Implementa la lógica para editar un robot
    }
}

// Uso de ejemplo
$db = new PDO('mysql:host=localhost;dbname=nombre_de_tu_base_de_datos', 'usuario', 'contraseña');
$controller = new RobotController($db);

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

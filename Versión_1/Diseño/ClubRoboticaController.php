<?php
require_once 'ClubRoboticaModel.php';

class ClubRoboticaController {
    private $model;

    public function __construct($db) {
        $this->model = new ClubRoboticaModel($db);
    }

    public function index() {
        $clubs = $this->model->getAllClubs();
        include 'ClubRoboticaView.php';
    }

    public function eliminar($id) {
        $this->model->deleteClub($id);
        header("Location: index.php");
    }

    public function editar($id) {
        // Aquí puedes implementar la lógica para cargar los datos del club y mostrar el formulario de edición
    }
}

// Uso de ejemplo
$db = new PDO('mysql:host=localhost;dbname=basedatos', 'root', '');
$controller = new ClubRoboticaController($db);

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


<?php
require_once 'ParticipanteGeneroModel.php';

class ParticipanteGeneroController {
    private $model;

    public function __construct($db) {
        $this->model = new ParticipanteGeneroModel($db);
    }

    public function index() {
        $generos = $this->model->getAllGeneros();
        include 'ParticipanteGeneroView.php';
    }

    public function eliminar($id) {
        $this->model->deleteGenero($id);
        header("Location: index.php");
    }

    public function editar($id) {
        // Implementa la lógica para editar un género de participante
    }
}

// Uso de ejemplo
$db = new PDO('mysql:host=localhost;dbname=nombre_de_tu_base_de_datos', 'usuario', 'contraseña');
$controller = new ParticipanteGeneroController($db);

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

<?php
require_once 'RobotCompetenciaModel.php';

class RobotCompetenciaController {
    private $model;

    public function __construct($db) {
        $this->model = new RobotCompetenciaModel($db);
    }

    public function index($competencia_id) {
        $robots_competencia = $this->model->getRobotsByCompetenciaId($competencia_id);
        include 'RobotCompetenciaView.php';
    }

    public function eliminar($id) {
        $this->model->eliminarRobotCompetencia($id);
        header("Location: index.php");
    }
}

// Uso de ejemplo
$db = new PDO('mysql:host=localhost;dbname=nombre_de_tu_base_de_datos', 'usuario', 'contraseña');
$controller = new RobotCompetenciaController($db);

// Manejo de las solicitudes
if (isset($_GET['competencia_id'])) {
    $competencia_id = $_GET['competencia_id'];
    if (isset($_GET['accion'])) {
        $accion = $_GET['accion'];
        switch ($accion) {
            case 'eliminar':
                $id = $_GET['id'];
                $controller->eliminar($id);
                break;
            default:
                $controller->index($competencia_id);
                break;
        }
    } else {
        $controller->index($competencia_id);
    }
} else {
    echo "ID de competencia no especificado.";
}
?>

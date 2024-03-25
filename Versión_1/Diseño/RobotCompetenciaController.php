<?php
require_once 'RobotCompetenciaModel.php';

class RobotCompetenciaController {
    private $model;

    public function __construct($db) {
        $this->model = new RobotCompetenciaModel($db);
    }

    public function index() {
        return $this->model->getAllRobotCompetencias();
    }

    public function deleteRobotCompetencia($id) {
        return $this->model->deleteRobotCompetencia($id);
    }

    public function getRobotCompetenciaById($id) {
        return $this->model->getRobotCompetenciaById($id);
    }

    public function updateRobotCompetencia($id, $id_robot, $id_competencia) {
        return $this->model->updateRobotCompetencia($id, $id_robot, $id_competencia);
    }
}
?>

<?php
require_once 'CompetenciaModel.php';

class CompetenciaController {
    private $model;

    public function __construct($db) {
        $this->model = new CompetenciaModel($db);
    }

    public function getAllCompetencias() {
        return $this->model->getAllCompetencias();
    }

    public function getCompetenciaById($id) {
        return $this->model->getCompetenciaById($id);
    }

    public function updateCompetencia($id, $nombre, $fecha_inicio_inscripcion, $fecha_fin_inscripcion, $fecha_compentencia, $tipo_competencia) {
        return $this->model->updateCompetencia($id, $nombre, $fecha_inicio_inscripcion, $fecha_fin_inscripcion, $fecha_compentencia, $tipo_competencia);
    }

    public function deleteCompetencia($id) {
        return $this->model->deleteCompetencia($id);
    }
}
?>

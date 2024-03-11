<?php
require_once 'GradoEstudioModel.php';

class GradoEstudioController {
    private $model;

    public function __construct($db) {
        $this->model = new GradoEstudioModel($db);
    }

    public function getAllGradosEstudio() {
        return $this->model->getAllGradosEstudio();
    }

    public function getGradoEstudioById($id) {
        return $this->model->getGradoEstudioById($id);
    }

    public function updateGradoEstudio($id, $grado) {
        return $this->model->updateGradoEstudio($id, $grado);
    }

    public function deleteGradoEstudio($id) {
        return $this->model->deleteGradoEstudio($id);
    }
}
?>

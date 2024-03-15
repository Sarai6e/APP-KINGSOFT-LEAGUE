<?php
require_once 'TipoCompetenciaModel.php';

class TipoCompetenciaController {
    private $model;

    public function __construct(TipoCompetenciaModel $model) {
        $this->model = $model;
    }

    public function index() {
        return $this->model->getAllTiposCompetencia();
    }

    public function getTipoCompetencia($id) {
        return $this->model->getTipoCompetenciaById($id);
    }

    public function updateTipoCompetencia($id, $nombre, $descripcion) {
        return $this->model->updateTipoCompetencia($id, $nombre, $descripcion);
    }

    public function deleteTipoCompetencia($id) {
        return $this->model->deleteTipoCompetencia($id);
    }
}
?>

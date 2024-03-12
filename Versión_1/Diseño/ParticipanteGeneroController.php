<?php
require_once 'ParticipanteGeneroModel.php';

class ParticipanteGeneroController {
    private $model;

    public function __construct($db) {
        $this->model = new ParticipanteGeneroModel($db);
    }

    public function getAllParticipanteGenero() {
        return $this->model->getAllParticipanteGenero();
    }

    public function getParticipanteGeneroById($id) {
        return $this->model->getParticipanteGeneroById($id);
    }

    public function updateParticipanteGenero($id, $genero) {
        return $this->model->updateParticipanteGenero($id, $genero);
    }

    public function deleteParticipanteGenero($id) {
        return $this->model->deleteParticipanteGenero($id);
    }
}
?>

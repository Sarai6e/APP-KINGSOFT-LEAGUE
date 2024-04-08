<?php
require_once 'ClubRoboticaModel.php';

class ClubRoboticaController {
    private $model;

    public function __construct($db) {
        $this->model = new ClubRoboticaModel($db);
    }

    public function index($id) {
        return $this->model->getClubs($id);
    }

    public function ver($id) {
        return $this->model->getClubById($id);
    }

    public function editar($id, $nombre, $ciudad, $pais) {
        return $this->model->updateClub($id, $nombre, $ciudad, $pais);
    }

    public function eliminar($id) {
        return $this->model->deleteClub($id);
    }
}
?>

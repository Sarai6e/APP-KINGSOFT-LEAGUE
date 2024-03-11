<?php
require_once 'ClubRoboticaModel.php';

class ClubRoboticaController {
    private $model;

    public function __construct($db) {
        $this->model = new ClubRoboticaModel($db);
    }

    public function index() {
        $clubs = $this->model->getClubs();
        return $clubs;
    }

    public function edit($id, $nombre, $ciudad, $pais) {
        if ($this->model->updateClub($id, $nombre, $ciudad, $pais)) {
            return true;
        }
        return false;
    }

    public function delete($id) {
        if ($this->model->deleteClub($id)) {
            return true;
        }
        return false;
    }
}
?>

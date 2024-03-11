<?php
require_once 'NombreInstitucionModel.php';

class NombreInstitucionController {
    private $model;

    public function __construct($db) {
        $this->model = new NombreInstitucionModel($db);
    }

    public function getAllNombresInstitucion() {
        return $this->model->getAllNombresInstitucion();
    }

    public function getNombreInstitucionById($id) {
        return $this->model->getNombreInstitucionById($id);
    }

    public function updateNombreInstitucion($id, $nombre) {
        return $this->model->updateNombreInstitucion($id, $nombre);
    }

    public function deleteNombreInstitucion($id) {
        return $this->model->deleteNombreInstitucion($id);
    }
}
?>

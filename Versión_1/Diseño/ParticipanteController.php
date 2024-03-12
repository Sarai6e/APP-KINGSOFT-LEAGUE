<?php
require_once 'ParticipanteModel.php';

class ParticipanteController {
    private $model;

    public function __construct($db) {
        $this->model = new ParticipanteModel($db);
    }

    public function getAllParticipantes() {
        return $this->model->getAllParticipantes();
    }

    public function getParticipanteById($id) {
        return $this->model->getParticipanteById($id);
    }

    public function updateParticipante($id, $nombre, $apellido, $dni, $genero_id, $grado_estudio_id, $año_estudio, $especialidad, $correo, $clave, $robot_id, $club_robotica_id, $fecha_nacimiento) {
        return $this->model->updateParticipante($id, $nombre, $apellido, $dni, $genero_id, $grado_estudio_id, $año_estudio, $especialidad, $correo, $clave, $robot_id, $club_robotica_id, $fecha_nacimiento);
    }

    public function deleteParticipante($id) {
        return $this->model->deleteParticipante($id);
    }
}
?>

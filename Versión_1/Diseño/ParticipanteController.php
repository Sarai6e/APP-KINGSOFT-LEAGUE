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

    public function updateParticipante($id, $nombre, $apellidos, $dni, $genero, $fecha_nacimiento, $correo, $anio_estudio, $especialidad, $clave, $grado_estudio, $id_club_robotica, $nombre_institucion_id) {
        return $this->model->updateParticipante($id, $nombre, $apellidos, $dni, $genero, $fecha_nacimiento, $correo, $anio_estudio, $especialidad, $clave, $grado_estudio, $id_club_robotica, $nombre_institucion_id);
    }

    public function deleteParticipante($id) {
        return $this->model->deleteParticipante($id);
    }
}
?>

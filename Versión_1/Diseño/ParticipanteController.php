<?php
require_once 'ParticipanteModel.php';

class ParticipanteController {
    private $model;

    public function __construct($db) {
        $this->model = new ParticipanteModel($db);
        $this->conn = $db;
    }

    public function getAllParticipantes() {
        return $this->model->getAllParticipantes();
        $query = "SELECT * FROM participantes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipanteById($id) {
        return $this->model->getParticipanteById($id);
        $query = "SELECT * FROM participantes WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateParticipante($id, $nombre, $apellido, $dni, $genero_id, $grado_estudio_id, $año_estudio, $especialidad, $correo, $clave, $robot_id, $club_robotica_id, $fecha_nacimiento) {
        return $this->model->updateParticipante($id, $nombre, $apellido, $dni, $genero_id, $grado_estudio_id, $año_estudio, $especialidad, $correo, $clave, $robot_id, $club_robotica_id, $fecha_nacimiento);
        $query = "UPDATE participantes SET nombre = ?, apellido = ?, dni = ?, participante_genero_id = ?, grado_estudio_id = ?, año_estudio = ?, especialidad = ?, correo = ?, clave = ?, robot_id = ?, club_robotica_id = ?, fecha_nacimiento = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nombre, $apellido, $dni, $genero_id, $grado_estudio_id, $año_estudio, $especialidad, $correo, $clave, $robot_id, $club_robotica_id, $fecha_nacimiento, $id]);
    }

    public function deleteParticipante($id) {
        return $this->model->deleteParticipante($id);
        $query = "DELETE FROM participantes WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}

?>
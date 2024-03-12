<?php
class ParticipanteModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllParticipantes() {
        $query = "SELECT * FROM participantes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getParticipanteById($id) {
        $query = "SELECT * FROM participantes WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateParticipante($id, $nombre, $apellido, $dni, $genero_id, $grado_estudio_id, $año_estudio, $especialidad, $correo, $clave, $robot_id, $club_robotica_id, $fecha_nacimiento) {
        $query = "UPDATE participantes SET nombre = ?, apellido = ?, dni = ?, participante_genero_id = ?, grado_estudio_id = ?, año_estudio = ?, especialidad = ?, correo = ?, clave = ?, robot_id = ?, club_robotica_id = ?, fecha_nacimiento = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $apellido);
        $stmt->bindParam(3, $dni);
        $stmt->bindParam(4, $genero_id);
        $stmt->bindParam(5, $grado_estudio_id);
        $stmt->bindParam(6, $año_estudio);
        $stmt->bindParam(7, $especialidad);
        $stmt->bindParam(8, $correo);
        $stmt->bindParam(9, $clave);
        $stmt->bindParam(10, $robot_id);
        $stmt->bindParam(11, $club_robotica_id);
        $stmt->bindParam(12, $fecha_nacimiento);
        $stmt->bindParam(13, $id);
        return $stmt->execute();
    }

    public function deleteParticipante($id) {
        $query = "DELETE FROM participantes WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
?>

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

    public function updateParticipante($id, $nombre, $apellidos, $dni, $genero, $fecha_nacimiento, $correo, $anio_estudio, $especialidad, $clave, $grado_estudio, $id_club_robotica, $nombre_institucion_id) {
        $query = "UPDATE participantes SET nombre = ?, apellidos = ?, dni = ?, genero = ?, fecha_nacimiento = ?, correo = ?, anio_estudio = ?, especialidad = ?, clave = ?, grado_estudio = ?, id_club_robotica = ?, nombre_institucion_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $apellidos);
        $stmt->bindParam(3, $dni);
        $stmt->bindParam(4, $genero);
        $stmt->bindParam(5, $fecha_nacimiento);
        $stmt->bindParam(6, $correo);
        $stmt->bindParam(7, $anio_estudio);
        $stmt->bindParam(8, $especialidad);
        $stmt->bindParam(9, $clave);
        $stmt->bindParam(10, $grado_estudio);
        $stmt->bindParam(11, $id_club_robotica);
        $stmt->bindParam(12, $nombre_institucion_id);
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

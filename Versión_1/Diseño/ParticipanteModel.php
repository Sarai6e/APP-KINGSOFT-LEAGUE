<?php
class ParticipanteModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllParticipantes() {
        $query = "SELECT * FROM participantes WHERE id = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function getParticipanteById($id) {
        $query = "SELECT * FROM participantes WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function updateParticipante($id, $nombre, $apellido, $dni, $genero_id, $grado_estudio_id, $año_estudio, $especialidad, $correo, $clave, $robot_id, $club_robotica_id, $fecha_nacimiento) {
        $query = "UPDATE participantes SET nombre = ?, apellido = ?, dni = ?, participante_genero_id = ?, grado_estudio_id = ?, año_estudio = ?, especialidad = ?, correo = ?, clave = ?, robot_id = ?, club_robotica_id = ?, fecha_nacimiento = ? WHERE id = ?";

        // Aquí se comprueba si el ID es 1
        if ($id == 1) {
            $query = "UPDATE participantes SET nombre = ?, apellido = ?, dni = ?, participante_genero_id = ?, grado_estudio_id = ?, año_estudio = ?, especialidad = ?, correo = ?, clave = ?, robot_id = ?, club_robotica_id = ?, fecha_nacimiento = ? WHERE id = 1";
        }

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nombre, $apellido, $dni, $genero_id, $grado_estudio_id, $año_estudio, $especialidad, $correo, $clave, $robot_id, $club_robotica_id, $fecha_nacimiento, $id]);
    }

    public function deleteParticipante($id) {
        $query = "DELETE FROM participantes WHERE id = ?";

        // Aquí se comprueba si el ID es 1
        if ($id == 1) {
            $query = "DELETE FROM participantes WHERE id = 1";
        }

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>

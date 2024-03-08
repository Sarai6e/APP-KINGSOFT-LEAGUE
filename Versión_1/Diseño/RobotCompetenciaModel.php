<?php
class RobotCompetenciaModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todos los robots de una competencia por su ID
    public function getRobotsByCompetenciaId($competencia_id) {
        $query = "SELECT * FROM robot_competencia WHERE id_competencia = :competencia_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['competencia_id' => $competencia_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todas las competencias de un robot por su ID
    public function getCompetenciasByRobotId($robot_id) {
        $query = "SELECT * FROM robot_competencia WHERE id_robot = :robot_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['robot_id' => $robot_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Asignar un robot a una competencia
    public function asignarRobotCompetencia($robot_id, $competencia_id) {
        $query = "INSERT INTO robot_competencia (id_robot, id_competencia) VALUES (:robot_id, :competencia_id)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['robot_id' => $robot_id, 'competencia_id' => $competencia_id]);
    }

    // Eliminar la asignación de un robot a una competencia
    public function eliminarRobotCompetencia($id) {
        $query = "DELETE FROM robot_competencia WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id]);
    }
}
?>

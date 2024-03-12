<?php
class RobotCompetenciaModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllRobotCompetencias() {
        $query = "SELECT * FROM robot_competencia";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getRobotCompetenciaById($id) {
        $query = "SELECT * FROM robot_competencia WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteRobotCompetencia($id) {
        $query = "DELETE FROM robot_competencia WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>

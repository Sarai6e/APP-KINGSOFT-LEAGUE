<?php
class RobotCompetenciaModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllRobotCompetencias() {
        $query = "SELECT robot_competencia.id, robot.nombre as robot, competencia.nombre as competencia, competencia.fecha_compentencia as fecha FROM robot_competencia inner join robot on robot.id=robot_competencia.id_robot inner join competencia on competencia.id=robot_competencia.id_competencia";
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

    public function updateRobotCompetencia($id, $id_robot, $id_competencia) {
        $query = "UPDATE robot_competencia SET id_robot = ?, id_competencia = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id_robot, $id_competencia, $id]);
    }
}
?>

<?php
class RobotModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllRobots() {
        $query = "SELECT * FROM robot where id_participantes = 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getRobotById($id) {
        $query = "SELECT * FROM robot WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateRobot($id, $nombre, $peso, $ancho, $alto) {
        $query = "UPDATE robot SET nombre = ?, peso = ?, ancho = ?, alto = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nombre, $peso, $ancho, $alto, $id]);
    }

    public function deleteRobot($id) {
        $query = "DELETE FROM robot WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>

<?php
class RobotModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todos los robots
    public function getAllRobots() {
        $query = "SELECT * FROM robot";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Eliminar un robot por ID
    public function deleteRobot($id) {
        $query = "DELETE FROM robot WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id]);
    }

    // Obtener un robot por ID
    public function getRobotById($id) {
        $query = "SELECT * FROM robot WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un robot
    public function updateRobot($id, $nombre, $peso, $ancho, $alto, $id_participante) {
        $query = "UPDATE robot SET nombre = :nombre, peso = :peso, ancho = :ancho, alto = :alto, id_participante = :id_participante WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            'id' => $id,
            'nombre' => $nombre,
            'peso' => $peso,
            'ancho' => $ancho,
            'alto' => $alto,
            'id_participante' => $id_participante
        ]);
    }
}
?>

<?php
class RobotController {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Método para obtener todos los robots
// Método para obtener todos los robots asociados al participante que ha iniciado sesión
public function index($id_participante) {
    $query = "SELECT * FROM robot WHERE id_participantes = ?";
    $stmt = $this->db->prepare($query);
    $stmt->execute([$id_participante]);
    return $stmt;
}


    // Método para obtener un robot por su ID
    public function getRobotById($id) {
        $query = "SELECT * FROM robot WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(":id" => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para actualizar un robot
    public function updateRobot($id, $nombre, $peso, $ancho, $alto) {
        $query = "UPDATE robot SET nombre = :nombre, peso = :peso, ancho = :ancho, alto = :alto WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(array(
            ":id" => $id,
            ":nombre" => $nombre,
            ":peso" => $peso,
            ":ancho" => $ancho,
            ":alto" => $alto
        ));
    }

    // Método para eliminar un robot
    public function deleteRobot($id) {
        $query = "DELETE FROM robot WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(array(":id" => $id));
    }
}
?>

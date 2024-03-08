<?php
class ParticipanteGeneroModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todos los géneros de participantes
    public function getAllGeneros() {
        $query = "SELECT * FROM participante_genero";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Eliminar un género de participante por ID
    public function deleteGenero($id) {
        $query = "DELETE FROM participante_genero WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id]);
    }

    // Obtener un género de participante por ID
    public function getGeneroById($id) {
        $query = "SELECT * FROM participante_genero WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un género de participante
    public function updateGenero($id, $genero) {
        $query = "UPDATE participante_genero SET genero = :genero WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id, 'genero' => $genero]);
    }
}
?>

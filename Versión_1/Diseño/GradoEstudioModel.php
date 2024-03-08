<?php
class GradoEstudioModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todos los grados de estudio
    public function getAllGradosEstudio() {
        $query = "SELECT * FROM grado_estudio";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Eliminar un grado de estudio por ID
    public function deleteGradoEstudio($id) {
        $query = "DELETE FROM grado_estudio WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id]);
    }

    // Obtener un grado de estudio por ID
    public function getGradoEstudioById($id) {
        $query = "SELECT * FROM grado_estudio WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un grado de estudio
    public function updateGradoEstudio($id, $grado) {
        $query = "UPDATE grado_estudio SET grado = :grado WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            'id' => $id,
            'grado' => $grado
        ]);
    }
}
?>

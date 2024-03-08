<?php
class NombreInstitucionModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todas las instituciones
    public function getAllInstituciones() {
        $query = "SELECT * FROM nombre_institucion";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Eliminar una institución por ID
    public function deleteInstitucion($id) {
        $query = "DELETE FROM nombre_institucion WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id]);
    }

    // Obtener una institución por ID
    public function getInstitucionById($id) {
        $query = "SELECT * FROM nombre_institucion WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar una institución
    public function updateInstitucion($id, $nombre) {
        $query = "UPDATE nombre_institucion SET nombre = :nombre WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id, 'nombre' => $nombre]);
    }
}
?>

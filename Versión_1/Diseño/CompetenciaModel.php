<?php
class CompetenciaModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todas las competencias
    public function getAllCompetencias() {
        $query = "SELECT * FROM competencia";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Eliminar una competencia por ID
    public function deleteCompetencia($id) {
        $query = "DELETE FROM competencia WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id]);
    }

    // Obtener una competencia por ID
    public function getCompetenciaById($id) {
        $query = "SELECT * FROM competencia WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar una competencia
    public function updateCompetencia($id, $nombre, $fecha_inicio_inscripcion, $fecha_fin_inscripcion, $fecha_compentencia, $tipo_competencia) {
        $query = "UPDATE competencia SET nombre = :nombre, fecha_inicio_inscripcion = :fecha_inicio_inscripcion, fecha_fin_inscripcion = :fecha_fin_inscripcion, fecha_compentencia = :fecha_compentencia, tipo_competencia = :tipo_competencia WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            'id' => $id,
            'nombre' => $nombre,
            'fecha_inicio_inscripcion' => $fecha_inicio_inscripcion,
            'fecha_fin_inscripcion' => $fecha_fin_inscripcion,
            'fecha_compentencia' => $fecha_compentencia,
            'tipo_competencia' => $tipo_competencia
        ]);
    }
}
?>

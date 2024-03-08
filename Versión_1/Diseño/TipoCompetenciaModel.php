<?php
class TipoCompetenciaModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todos los tipos de competencia
    public function getAllTiposCompetencia() {
        $query = "SELECT * FROM tipo_competencia";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

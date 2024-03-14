<?php
class TipoCompetenciaModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    // Método para obtener todos los tipos de competencia
    public function getAllTiposCompetencia() {
        $query = "SELECT * FROM tipo_competencia";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

<?php
class TipoCompetenciaModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    // Método para obtener un tipo de competencia por su ID
    public function getTipoCompetenciaById($id) {
        $query = "SELECT * FROM tipo_competencia WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Otros métodos del modelo...
}
?>

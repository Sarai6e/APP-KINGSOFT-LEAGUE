<?php
class TipoCompetenciaModel {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAllTiposCompetencia() {
        $query = "SELECT * FROM tipo_competencia";
        $stmt = $this->db->query($query);
        return $stmt;
    }

    public function getTipoCompetenciaById($id) {
        $query = "SELECT * FROM tipo_competencia WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(":id" => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateTipoCompetencia($id, $nombre, $descripcion) {
        $query = "UPDATE tipo_competencia SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(array(
            ":id" => $id,
            ":nombre" => $nombre,
            ":descripcion" => $descripcion
        ));
    }

    public function deleteTipoCompetencia($id) {
        $query = "DELETE FROM tipo_competencia WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(array(":id" => $id));
    }
}
?>

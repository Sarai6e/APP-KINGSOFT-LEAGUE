<?php
class CompetenciaModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllCompetencias() {
        $query = "SELECT * FROM competencia where id = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getCompetenciaById($id) {
        $query = "SELECT * FROM competencia WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam($id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCompetencia($id, $nombre, $fecha_inicio_inscripcion, $fecha_fin_inscripcion, $fecha_compentencia, $tipo_competencia) {
        $query = "UPDATE competencia SET nombre = ?, fecha_inicio_inscripcion = ?, fecha_fin_inscripcion = ?, fecha_compentencia = ?, tipo_competencia = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $fecha_inicio_inscripcion);
        $stmt->bindParam(3, $fecha_fin_inscripcion);
        $stmt->bindParam(4, $fecha_compentencia);
        $stmt->bindParam(5, $tipo_competencia);
        $stmt->bindParam(6, $id);
        return $stmt->execute();
    } 

    public function deleteCompetencia($id) {
        $query = "DELETE FROM competencia WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
?>

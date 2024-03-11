<?php
class GradoEstudioModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllGradosEstudio() {
        $query = "SELECT * FROM grado_estudio";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getGradoEstudioById($id) {
        $query = "SELECT * FROM grado_estudio WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateGradoEstudio($id, $grado) {
        $query = "UPDATE grado_estudio SET grado = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $grado);
        $stmt->bindParam(2, $id);
        return $stmt->execute();
    }

    public function deleteGradoEstudio($id) {
        $query = "DELETE FROM grado_estudio WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
?>

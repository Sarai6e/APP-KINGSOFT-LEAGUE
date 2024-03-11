<?php
class NombreInstitucionModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllNombresInstitucion() {
        $query = "SELECT * FROM nombre_institucion";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getNombreInstitucionById($id) {
        $query = "SELECT * FROM nombre_institucion WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateNombreInstitucion($id, $nombre) {
        $query = "UPDATE nombre_institucion SET nombre = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $id);
        return $stmt->execute();
    }

    public function deleteNombreInstitucion($id) {
        $query = "DELETE FROM nombre_institucion WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
?>

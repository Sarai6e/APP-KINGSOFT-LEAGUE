<?php
class ParticipanteGeneroModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllParticipanteGenero() {
        $query = "SELECT * FROM participante_genero";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getParticipanteGeneroById($id) {
        $query = "SELECT * FROM participante_genero WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateParticipanteGenero($id, $genero) {
        $query = "UPDATE participante_genero SET genero = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $genero);
        $stmt->bindParam(2, $id);
        return $stmt->execute();
    }

    public function deleteParticipanteGenero($id) {
        $query = "DELETE FROM participante_genero WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
?>

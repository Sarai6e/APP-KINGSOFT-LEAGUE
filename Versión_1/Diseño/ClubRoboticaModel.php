<?php
class ClubRoboticaModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getClubs() {
        $query = "SELECT * FROM club_robotica";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getClubById($id) {
        $query = "SELECT * FROM club_robotica WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateClub($id, $nombre, $ciudad, $pais) {
        $query = "UPDATE club_robotica SET nombre = ?, ciudad = ?, pais = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $ciudad);
        $stmt->bindParam(3, $pais);
        $stmt->bindParam(4, $id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deleteClub($id) {
        $query = "DELETE FROM club_robotica WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>

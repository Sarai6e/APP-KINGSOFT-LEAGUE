<?php
class ClubRoboticaModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Obtener todos los clubes de robótica
    public function getAllClubs() {
        $query = "SELECT * FROM club_robotica";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Eliminar un club de robótica por ID
    public function deleteClub($id) {
        $query = "DELETE FROM club_robotica WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id]);
    }

    // Obtener un club de robótica por ID
    public function getClubById($id) {
        $query = "SELECT * FROM club_robotica WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un club de robótica
    public function updateClub($id, $nombre, $ciudad, $pais, $logo, $nombre_institucion_id) {
        $query = "UPDATE club_robotica SET nombre = :nombre, ciudad = :ciudad, pais = :pais, logo = :logo, nombre_institucion_id = :nombre_institucion_id WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            'id' => $id,
            'nombre' => $nombre,
            'ciudad' => $ciudad,
            'pais' => $pais,
            'logo' => $logo,
            'nombre_institucion_id' => $nombre_institucion_id
        ]);
    }
}
?>

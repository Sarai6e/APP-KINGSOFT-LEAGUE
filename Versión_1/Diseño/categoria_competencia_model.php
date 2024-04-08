<?php
class CategoriaCompetenciaModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todas las categorías de competencia
    public function getAllCategoriaCompetencia() {
        $query = "SELECT * FROM categoria_competencia";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Obtener una categoría de competencia por su ID
    public function getCategoriaCompetenciaById($id) {
        $query = "SELECT * FROM categoria_competencia WHERE id_competencia = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar una categoría de competencia
    public function updateCategoriaCompetencia($id, $id_tipo_competencia, $id_categoria_jugador, $reglas, $precio) {
        $query = "UPDATE categoria_competencia SET id_tipo_competencia = ?, id_categoria_jugador = ?, reglas = ?, precio = ? WHERE id_competencia = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id_tipo_competencia);
        $stmt->bindParam(2, $id_categoria_jugador);
        $stmt->bindParam(3, $reglas);
        $stmt->bindParam(4, $precio);
        $stmt->bindParam(5, $id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar una categoría de competencia
    public function deleteCategoriaCompetencia($id) {
        $query = "DELETE FROM categoria_competencia WHERE id_competencia = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>

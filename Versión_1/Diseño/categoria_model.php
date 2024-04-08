<?php
class CategoriaModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todas las categorías
    public function getAllCategorias() {
        $query = "SELECT * FROM categoria";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Obtener una categoría por su ID
    public function getCategoriaById($id) {
        $query = "SELECT * FROM categoria WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar una categoría
    public function updateCategoria($id, $amateur, $senior, $master) {
        $query = "UPDATE categoria SET amateur = ?, senior = ?, master = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $amateur);
        $stmt->bindParam(2, $senior);
        $stmt->bindParam(3, $master);
        $stmt->bindParam(4, $id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar una categoría
    public function deleteCategoria($id) {
        $query = "DELETE FROM categoria WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>

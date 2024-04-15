<?php
class InscripcionModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todas las inscripciones
    public function getAllInscripciones() {
        $query = "SELECT * FROM inscripcion";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Obtener una inscripción por su ID
    public function getInscripcionById($id) {
        $query = "SELECT * FROM inscripcion WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar una inscripción
    public function updateInscripcion($id, $id_categoria_competencia, $id_robot, $boucher, $confirmacion, $puntaje, $posiscion, $descalificacion) {
        $query = "UPDATE inscripcion SET id_categoria_competencia = ?, id_robot = ?, boucher = ?, confirmacion = ?, puntaje = ?, posicion = ?, descalificacion = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id_categoria_competencia);
        $stmt->bindParam(2, $id_robot);
        $stmt->bindParam(3, $boucher);
        $stmt->bindParam(4, $confirmacion);
        $stmt->bindParam(5, $puntaje);
        $stmt->bindParam(6, $posiscion);
        $stmt->bindParam(7, $descalificacion);
        $stmt->bindParam(8, $id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar una inscripción
    public function deleteInscripcion($id) {
        $query = "DELETE FROM inscripcion WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>



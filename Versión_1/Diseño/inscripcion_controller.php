<?php
require_once 'Inscripcion_Model.php';

class InscripcionController {
    private $model;
    private $db;

    public function __construct($db) {
        $this->model = new InscripcionModel($db);
        $this->db = $db;
    }

    public function getAllInscripciones() {
        return $this->model->getAllInscripciones();
    }

    public function getInscripcionById($id) {
        return $this->model->getInscripcionById($id);
    }

    public function updateInscripcion($id, $id_categoria_competencia, $id_robot, $boucher, $confirmacion, $puntaje, $posicion, $descalificacion) {
        return $this->model->updateInscripcion($id, $id_categoria_competencia, $id_robot, $boucher, $confirmacion, $puntaje, $posicion, $descalificacion);
    }

    public function deleteInscripcion($id) {
        return $this->model->deleteInscripcion($id);
    }

    public function confirmarInscripcion($id_inscripcion, $decision) {
        $sql = "UPDATE inscripcion SET confirmacion = :decision WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id_inscripcion, PDO::PARAM_INT);
        $stmt->bindParam(':decision', $decision, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Método para agregar una nueva inscripción
    public function agregarInscripcion($id_participante, $id_categoria, $id_robot, $boucher, $confirmacion, $puntaje, $posicion, $descalificacion) {
        try {
            $stmt = $this->db->prepare("INSERT INTO inscripcion (id_categoria_competencia, id_robot, boucher, confirmacion, puntaje, posicion, descalificacion, id_participante) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $id_categoria);
            $stmt->bindParam(2, $id_robot);
            $stmt->bindParam(3, $boucher);
            $stmt->bindParam(4, $confirmacion);
            $stmt->bindParam(5, $puntaje);
            $stmt->bindParam(6, $posicion);
            $stmt->bindParam(7, $descalificacion);
            $stmt->bindParam(8, $id_participante);
            $stmt->execute();
            return true; // Retorna true si la inserción fue exitosa
        } catch (PDOException $e) {
            echo "Error al agregar la inscripción: " . $e->getMessage();
            return false; // Retorna false si hubo un error
        }
    }
}
?>

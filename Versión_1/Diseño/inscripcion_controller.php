<?php
require_once 'Inscripcion_Model.php';

class InscripcionController {
    private $model;
    private $db; // Agrega esta propiedad para la conexión PDO

    public function __construct($db) {
        $this->model = new InscripcionModel($db);
        $this->db = $db; // Inicializa la propiedad $db con la conexión PDO
    }

    // Obtener todas las inscripciones
    public function getAllInscripciones() {
        return $this->model->getAllInscripciones();
    }

    // Obtener una inscripción por su ID
    public function getInscripcionById($id) {
        return $this->model->getInscripcionById($id);
    }

    // Actualizar una inscripción
    public function updateInscripcion($id, $id_categoria_competencia, $id_robot, $boucher, $confirmacion, $puntaje, $posicion, $descalificacion) {
        return $this->model->updateInscripcion($id, $id_categoria_competencia, $id_robot, $boucher, $confirmacion, $puntaje, $posicion, $descalificacion);
    }

    // Eliminar una inscripción
    public function deleteInscripcion($id) {
        return $this->model->deleteInscripcion($id);
    }

    // Método para confirmar o rechazar una inscripción
    public function confirmarInscripcion($id_inscripcion, $decision) {
        // Aquí puedes agregar la lógica para actualizar la confirmación en la base de datos
        // Por ejemplo, podrías ejecutar una consulta SQL para actualizar el campo 'confirmacion' en la tabla 'inscripcion'

        // Por simplicidad, asumiré que tienes una función para ejecutar consultas SQL en tu clase PDO $db
        $sql = "UPDATE inscripcion SET confirmacion = :decision WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id_inscripcion, PDO::PARAM_INT);
        $stmt->bindParam(':decision', $decision, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
?>

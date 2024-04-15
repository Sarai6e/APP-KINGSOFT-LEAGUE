<?php
require_once 'Inscripcion_Model.php';

class InscripcionController {
    private $model;

    public function __construct($db) {
        $this->model = new InscripcionModel($db);
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
}

?>

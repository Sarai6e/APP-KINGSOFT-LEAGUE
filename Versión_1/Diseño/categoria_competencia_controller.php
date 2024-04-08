<?php
require_once 'Categoria_Competencia_Model.php';

class CategoriaCompetenciaController {
    private $model;

    public function __construct($db) {
        $this->model = new CategoriaCompetenciaModel($db);
    }

    // Obtener todas las categorías de competencia
    public function getAllCategoriaCompetencia() {
        return $this->model->getAllCategoriaCompetencia();
    }

    // Obtener una categoría de competencia por su ID
    public function getCategoriaCompetenciaById($id) {
        return $this->model->getCategoriaCompetenciaById($id);
    }

    // Actualizar una categoría de competencia
    public function updateCategoriaCompetencia($id, $id_tipo_competencia, $id_categoria_jugador, $reglas, $precio) {
        return $this->model->updateCategoriaCompetencia($id, $id_tipo_competencia, $id_categoria_jugador, $reglas, $precio);
    }

    // Eliminar una categoría de competencia
    public function deleteCategoriaCompetencia($id) {
        return $this->model->deleteCategoriaCompetencia($id);
    }
}
?>

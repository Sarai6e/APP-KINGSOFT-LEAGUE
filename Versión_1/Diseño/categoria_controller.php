<?php
require_once 'Categoria_Model.php';

class CategoriaController {
    private $model;

    public function __construct($db) {
        $this->model = new CategoriaModel($db);
    }

    // Obtener todas las categorías
    public function getAllCategorias() {
        return $this->model->getAllCategorias();
    }

    // Obtener una categoría por su ID
    public function getCategoriaById($id) {
        return $this->model->getCategoriaById($id);
    }

    // Actualizar una categoría
    public function updateCategoria($id, $amateur, $senior, $master) {
        return $this->model->updateCategoria($id, $amateur, $senior, $master);
    }

    // Eliminar una categoría
    public function deleteCategoria($id) {
        return $this->model->deleteCategoria($id);
    }
}
?>

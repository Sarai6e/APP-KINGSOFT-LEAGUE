<?php
require_once 'TipoCompetenciaController.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new TipoCompetenciaController(new TipoCompetenciaModel($db));

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    if($controller->updateTipoCompetencia($id, $nombre, $descripcion)) {
        echo "Tipo de competencia actualizado correctamente.";
    } else {
        echo "Error al actualizar el tipo de competencia.";
    }
} else {
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
        $controller = new TipoCompetenciaController(new TipoCompetenciaModel($db));

        $id = $_GET['id'];
        $tipoCompetencia = $controller->getTipoCompetencia($id);

        if($tipoCompetencia) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipo de Competencia</title>
</head>
<body>
    <h1>Editar Tipo de Competencia</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $tipoCompetencia['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $tipoCompetencia['nombre']; ?>"><br><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" value="<?php echo $tipoCompetencia['descripcion']; ?>"><br><br>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
<?php
        } else {
            echo "Tipo de competencia no encontrado.";
        }
    } else {
        echo "ID de tipo de competencia no proporcionado.";
    }
}
?>

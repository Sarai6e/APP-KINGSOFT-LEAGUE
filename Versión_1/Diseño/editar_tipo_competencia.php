<?php
require_once 'TipoCompetenciaController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
    $controller = new TipoCompetenciaController(new TipoCompetenciaModel($db));

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    if ($controller->updateTipoCompetencia($id, $nombre, $descripcion)) {
        echo "Tipo de competencia actualizado correctamente.";
    } else {
        echo "Error al actualizar el tipo de competencia.";
    }
} else {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
        $controller = new TipoCompetenciaController(new TipoCompetenciaModel($db));

        $id = $_GET['id'];
        $tipoCompetencia = $controller->getTipoCompetencia($id);

        if ($tipoCompetencia) {
?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Editar Tipo de Competencia</title>
                <!-- Agregar Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            </head>
            <body>
                <div class="container">
                    <h1>Editar Tipo de Competencia</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $tipoCompetencia['id']; ?>">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $tipoCompetencia['nombre']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <input type="text" class="form-control" name="descripcion" value="<?php echo $tipoCompetencia['descripcion']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <!-- Botón de cancelar con Bootstrap -->
                        <a href="javascript:history.go(-1)" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
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

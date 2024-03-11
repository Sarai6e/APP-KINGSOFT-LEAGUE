<?php
require_once 'GradoEstudioController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new GradoEstudioController($db);

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $grado = $_POST['grado'];

    if($controller->updateGradoEstudio($id, $grado)) {
        echo "Grado de estudio actualizado correctamente.";
    } else {
        echo "Error al actualizar el grado de estudio.";
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $grado = $controller->getGradoEstudioById($id);
    if ($grado) {
        ?>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $grado['id']; ?>">
            Grado: <input type="text" name="grado" value="<?php echo $grado['grado']; ?>"><br>
            <input type="submit" name="submit" value="Actualizar">
        </form>
        <?php
    } else {
        echo "Grado de estudio no encontrado.";
    }
} else {
    echo "ID de grado de estudio no proporcionado.";
}
?>

<?php
require_once 'NombreInstitucionController.php';

$db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
$controller = new NombreInstitucionController($db);

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    if($controller->updateNombreInstitucion($id, $nombre)) {
        echo "Nombre de la institución actualizado correctamente.";
    } else {
        echo "Error al actualizar el nombre de la institución.";
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $nombre_institucion = $controller->getNombreInstitucionById($id);
    if ($nombre_institucion) {
        ?>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $nombre_institucion['id']; ?>">
            Nombre: <input type="text" name="nombre" value="<?php echo $nombre_institucion['nombre']; ?>"><br>
            <input type="submit" name="submit" value="Actualizar">
        </form>
        <?php
    } else {
        echo "Nombre de la institución no encontrado.";
    }
} else {
    echo "ID del nombre de la institución no proporcionado.";
}
?>
